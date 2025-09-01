<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Block;
use App\Models\Site;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SiteBuilderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $templates = Template::where('is_active', true)->get();
        $blocks = Block::where('is_active', true)->orderBy('sort_order')->get();
        
        // Добавляем URL для миниатюрного предпросмотра к каждому блоку
        $blocks->each(function ($block) {
            $block->mini_preview_url = route('blocks.mini-preview', $block);
        });
        
        // Группируем блоки по категориям
        $blocksByCategory = $blocks->groupBy('category');
        
        return view('site-builder.index', compact('templates', 'blocksByCategory'));
    }

    public function preview(Request $request)
    {
        try {
            $templateId = $request->input('template_id');
            $selectedBlocks = $request->input('selected_blocks', []);
            $editedContent = $request->input('edited_content', []);
            
            // Валидация
            if (!$templateId || empty($selectedBlocks)) {
                return response()->json([
                    'error' => 'Не выбран шаблон или блоки'
                ], 400);
            }
            
            $template = Template::findOrFail($templateId);
            
            // Получаем блоки одним запросом для оптимизации
            $blockIds = array_map('intval', $selectedBlocks);
            $blocksCollection = Block::whereIn('id', $blockIds)->get()->keyBy('id');
            
            $blocks = collect();
            foreach ($selectedBlocks as $blockId) {
                $blockId = intval($blockId);
                if ($blocksCollection->has($blockId)) {
                    $block = $blocksCollection->get($blockId);
                    
                    // Применяем отредактированный контент если есть
                    if (isset($editedContent[$blockId])) {
                        $block->html_content = $editedContent[$blockId];
                    }
                    $blocks->push($block);
                }
            }
            
            if ($blocks->isEmpty()) {
                return response()->json([
                    'error' => 'Не найдены выбранные блоки'
                ], 404);
            }
            
            $html = $this->generateEditableHtml($template, $blocks);
            
            return response()->json([
                'html' => $html,
                'blocks_count' => $blocks->count(),
                'template_name' => $template->name
            ]);
            
        } catch (\Exception $e) {
            Log::error('Ошибка генерации предпросмотра: ' . $e->getMessage());
            
            return response()->json([
                'error' => 'Внутренняя ошибка сервера'
            ], 500);
        }
    }

    public function updateBlockContent(Request $request)
    {
        $blockId = $request->input('block_id');
        $content = $request->input('content');
        
        return response()->json([
            'success' => true,
            'block_id' => $blockId,
            'content' => $content
        ]);
    }

    public function build(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'template_id' => 'required|exists:templates,id',
            'selected_blocks' => 'required|array|min:1',
            'domain' => 'nullable|string|max:255',
            'edited_content' => 'nullable|array'
        ]);

        $template = Template::findOrFail($request->template_id);
        
        // Получаем блоки в том порядке, в котором они были выбраны
        $blocks = collect();
        foreach ($request->selected_blocks as $blockId) {
            $block = Block::find($blockId);
            if ($block) {
                // Применяем отредактированный контент если есть
                if (isset($request->edited_content[$blockId])) {
                    $block->html_content = $request->edited_content[$blockId];
                }
                $blocks->push($block);
            }
        }

        // Создаем запись сайта
        $site = Site::create([
            'user_id' => auth()->id(),
            'name' => $request->site_name,
            'domain' => $request->domain,
            'template_id' => $request->template_id,
            'selected_blocks' => $request->selected_blocks,
            'folder_path' => '', // будет заполнено после создания папки
            'status' => 'draft',
            'custom_settings' => json_encode([
                'edited_content' => $request->edited_content ?? []
            ])
        ]);

        // Создаем папку сайта
        $folderName = Str::slug($request->site_name) . '_' . $site->id;
        $sitePath = public_path('generated_sites/' . $folderName);
        
        if (!File::exists($sitePath)) {
            File::makeDirectory($sitePath, 0755, true);
        }

        // Обновляем путь к папке
        $site->update(['folder_path' => 'generated_sites/' . $folderName]);

        // Генерируем файлы сайта
        $this->generateSiteFiles($site, $template, $blocks);

        return response()->json([
            'success' => true,
            'message' => 'Сайт успешно создан!',
            'site_id' => $site->id,
            'download_url' => route('site-builder.download', $site->id)
        ]);
    }

    public function download($siteId)
    {
        $site = Site::where('user_id', auth()->id())->findOrFail($siteId);
        $sitePath = public_path($site->folder_path);
        
        if (!File::exists($sitePath)) {
            abort(404, 'Файлы сайта не найдены');
        }

        // Создаем ZIP архив
        $zipPath = storage_path('app/temp/' . $site->name . '.zip');
        
        if (!File::exists(dirname($zipPath))) {
            File::makeDirectory(dirname($zipPath), 0755, true);
        }

        $zip = new \ZipArchive();
        if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {
            $this->addDirectoryToZip($sitePath, $zip, '');
            $zip->close();
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    private function generateHtml($template, $blocks)
    {
        $html = '<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Предпросмотр сайта</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        ' . $template->custom_css . '
    </style>
</head>
<body>';

        foreach ($blocks as $block) {
            $html .= $block->html_content;
        }

        $html .= '
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>';

        return $html;
    }

    private function generateEditableHtml($template, $blocks)
    {
        $html = '<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Предпросмотр сайта</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        ' . $template->custom_css . '
        
        /* Стили для редактирования */
        .editable-block {
            position: relative;
            min-height: 50px;
        }
        
        .editable-block:hover {
            outline: 2px dashed #007bff;
            outline-offset: 4px;
        }
        
        .editable-block:hover::before {
            content: "Нажмите для редактирования";
            position: absolute;
            top: -25px;
            left: 0;
            background: #007bff;
            color: white;
            padding: 2px 8px;
            font-size: 12px;
            border-radius: 3px;
            z-index: 1000;
        }
        
        .editing {
            outline: 2px solid #28a745 !important;
        }
    </style>
</head>
<body>';

        foreach ($blocks as $index => $block) {
            $html .= '<div class="editable-block" data-block-id="' . $block->id . '" data-block-index="' . $index . '">';
            $html .= $block->html_content;
            $html .= '</div>';
        }

        $html .= '
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editableBlocks = document.querySelectorAll(".editable-block");
            
            editableBlocks.forEach(block => {
                block.addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    if (!this.classList.contains("editing")) {
                        this.contentEditable = true;
                        this.classList.add("editing");
                        this.focus();
                        
                        // Сохраняем оригинальный контент
                        this.dataset.originalContent = this.innerHTML;
                    }
                });
                
                block.addEventListener("blur", function() {
                    this.contentEditable = false;
                    this.classList.remove("editing");
                    
                    // Отправляем обновленный контент в родительское окно
                    if (window.parent && this.innerHTML !== this.dataset.originalContent) {
                        window.parent.postMessage({
                            type: "blockContentChanged",
                            blockId: this.dataset.blockId,
                            content: this.innerHTML
                        }, "*");
                    }
                });
                
                block.addEventListener("keydown", function(e) {
                    if (e.key === "Escape") {
                        this.innerHTML = this.dataset.originalContent;
                        this.blur();
                    }
                    if (e.key === "Enter" && e.ctrlKey) {
                        this.blur();
                    }
                });
            });
        });
    </script>
</body>
</html>';

        return $html;
    }

    private function generateSiteFiles($site, $template, $blocks)
    {
        $sitePath = public_path($site->folder_path);
        
        // Создаем основные папки
        File::makeDirectory($sitePath . '/css', 0755, true);
        File::makeDirectory($sitePath . '/js', 0755, true);
        File::makeDirectory($sitePath . '/images', 0755, true);
        File::makeDirectory($sitePath . '/includes', 0755, true);

        // Генерируем отдельные файлы блоков
        $includeStatements = [];
        foreach ($blocks as $index => $block) {
            $blockFileName = 'block_' . $block->id . '_' . Str::slug($block->name) . '.php';
            $blockFilePath = $sitePath . '/includes/' . $blockFileName;
            
            // Создаем PHP файл блока
            $blockContent = "<?php\n";
            $blockContent .= "// Блок: " . $block->name . "\n";
            $blockContent .= "// Тип: " . $block->type . "\n";
            $blockContent .= "// Категория: " . $block->category . "\n";
            $blockContent .= "?>\n\n";
            $blockContent .= $block->html_content;
            
            File::put($blockFilePath, $blockContent);
            $includeStatements[] = "<?php include 'includes/" . $blockFileName . "'; ?>";
        }

        // Генерируем index.php
        $indexContent = '<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . $site->name . '</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

' . implode("\n\n", $includeStatements) . '

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>';

        File::put($sitePath . '/index.php', $indexContent);

        // Создаем отдельный CSS файл
        $css = "/* Сайт: " . $site->name . " */\n";
        $css .= "/* Создан: " . now()->format('d.m.Y H:i') . " */\n\n";
        $css .= "/* Шаблон: " . $template->name . " */\n";
        $css .= $template->custom_css . "\n\n";
        
        foreach ($blocks as $block) {
            if ($block->css_content) {
                $css .= "/* Блок: " . $block->name . " (" . $block->type . ") */\n";
                $css .= $block->css_content . "\n\n";
            }
        }
        File::put($sitePath . '/css/style.css', $css);

        // Создаем отдельный JS файл
        $js = "/* Сайт: " . $site->name . " */\n";
        $js .= "/* Создан: " . now()->format('d.m.Y H:i') . " */\n\n";
        
        foreach ($blocks as $block) {
            if ($block->js_content) {
                $js .= "/* Блок: " . $block->name . " (" . $block->type . ") */\n";
                $js .= $block->js_content . "\n\n";
            }
        }
        
        if (trim($js) !== "/* Сайт: " . $site->name . " */\n/* Создан: " . now()->format('d.m.Y H:i') . " */") {
            File::put($sitePath . '/js/script.js', $js);
        }

        // Создаем конфигурационный файл
        $config = "<?php\n";
        $config .= "// Конфигурация сайта\n\n";
        $config .= "define('SITE_NAME', '" . addslashes($site->name) . "');\n";
        $config .= "define('SITE_DOMAIN', '" . addslashes($site->domain ?: '') . "');\n";
        $config .= "define('SITE_CREATED', '" . $site->created_at->format('Y-m-d H:i:s') . "');\n";
        $config .= "define('TEMPLATE_NAME', '" . addslashes($template->name) . "');\n\n";
        $config .= "// Блоки сайта\n";
        $config .= "\$site_blocks = [\n";
        foreach ($blocks as $block) {
            $config .= "    [\n";
            $config .= "        'id' => " . $block->id . ",\n";
            $config .= "        'name' => '" . addslashes($block->name) . "',\n";
            $config .= "        'type' => '" . addslashes($block->type) . "',\n";
            $config .= "        'category' => '" . addslashes($block->category) . "',\n";
            $config .= "        'file' => 'includes/block_" . $block->id . "_" . Str::slug($block->name) . ".php'\n";
            $config .= "    ],\n";
        }
        $config .= "];\n";
        
        File::put($sitePath . '/config.php', $config);

        // Создаем README файл
        $readme = "# " . $site->name . "\n\n";
        $readme .= "Сайт создан с помощью конструктора.\n";
        $readme .= "Дата создания: " . $site->created_at->format('d.m.Y H:i') . "\n";
        $readme .= "Шаблон: " . $template->name . "\n\n";
        $readme .= "## Структура проекта:\n";
        $readme .= "- `index.php` - главная страница\n";
        $readme .= "- `config.php` - конфигурация сайта\n";
        $readme .= "- `css/style.css` - стили сайта\n";
        $readme .= "- `js/script.js` - скрипты сайта\n";
        $readme .= "- `includes/` - папка с блоками сайта\n";
        $readme .= "- `images/` - папка для изображений\n\n";
        $readme .= "## Блоки сайта:\n";
        foreach ($blocks as $index => $block) {
            $readme .= ($index + 1) . ". **" . $block->name . "** (" . $block->type . ")\n";
            $readme .= "   - Файл: `includes/block_" . $block->id . "_" . Str::slug($block->name) . ".php`\n";
            $readme .= "   - Категория: " . $block->category . "\n";
            if ($block->description) {
                $readme .= "   - Описание: " . $block->description . "\n";
            }
            $readme .= "\n";
        }
        
        $readme .= "## Редактирование:\n";
        $readme .= "1. Основные настройки находятся в `config.php`\n";
        $readme .= "2. Стили можно изменить в `css/style.css`\n";
        $readme .= "3. Каждый блок можно редактировать отдельно в папке `includes/`\n";
        $readme .= "4. Для добавления изображений используйте папку `images/`\n\n";
        $readme .= "## Развертывание:\n";
        $readme .= "Загрузите все файлы на веб-сервер с поддержкой PHP.\n";
        
        File::put($sitePath . '/README.md', $readme);

        // Создаем .htaccess для красивых URL (опционально)
        $htaccess = "# Конфигурация для сайта: " . $site->name . "\n";
        $htaccess .= "RewriteEngine On\n\n";
        $htaccess .= "# Безопасность\n";
        $htaccess .= "Options -Indexes\n";
        $htaccess .= "<Files config.php>\n";
        $htaccess .= "    Order deny,allow\n";
        $htaccess .= "    Deny from all\n";
        $htaccess .= "</Files>\n\n";
        $htaccess .= "# Кэширование статических файлов\n";
        $htaccess .= "<IfModule mod_expires.c>\n";
        $htaccess .= "    ExpiresActive on\n";
        $htaccess .= "    ExpiresByType text/css \"access plus 1 month\"\n";
        $htaccess .= "    ExpiresByType application/javascript \"access plus 1 month\"\n";
        $htaccess .= "    ExpiresByType image/png \"access plus 1 month\"\n";
        $htaccess .= "    ExpiresByType image/jpg \"access plus 1 month\"\n";
        $htaccess .= "    ExpiresByType image/jpeg \"access plus 1 month\"\n";
        $htaccess .= "</IfModule>\n";
        
        File::put($sitePath . '/.htaccess', $htaccess);
    }

    private function addDirectoryToZip($dir, $zip, $zipDir)
    {
        if (is_dir($dir)) {
            if ($handle = opendir($dir)) {
                while (($file = readdir($handle)) !== false) {
                    if ($file != "." && $file != "..") {
                        $filePath = $dir . '/' . $file;
                        $relativePath = $zipDir . $file;
                        
                        if (is_dir($filePath)) {
                            $zip->addEmptyDir($relativePath);
                            $this->addDirectoryToZip($filePath, $zip, $relativePath . '/');
                        } else {
                            $zip->addFile($filePath, $relativePath);
                        }
                    }
                }
                closedir($handle);
            }
        }
    }

    public function sites()
    {
        $sites = Site::with('template')
                    ->where('user_id', auth()->id())
                    ->orderBy('created_at', 'desc')
                    ->get();
        return view('site-builder.sites', compact('sites'));
    }
}
