<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Block;
use Illuminate\Support\Facades\Validator;

class BlockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Отображение списка блоков
     */
    public function index()
    {
        $blocks = Block::orderBy('category')->orderBy('sort_order')->paginate(15);
        $categories = Block::distinct()->pluck('category')->filter()->sort();
        
        return view('blocks.index', compact('blocks', 'categories'));
    }

    /**
     * Форма создания блока
     */
    public function create(Request $request)
    {
        $categories = Block::distinct()->pluck('category')->filter()->sort();
        
        // Если запрашивается дублирование блока
        $duplicateData = null;
        if ($request->has('duplicate_from')) {
            $originalBlock = Block::find($request->input('duplicate_from'));
            if ($originalBlock) {
                $duplicateData = [
                    'name' => $request->input('name', $originalBlock->name . ' (копия)'),
                    'type' => $request->input('type', $originalBlock->type),
                    'category' => $request->input('category', $originalBlock->category),
                    'description' => $request->input('description', $originalBlock->description),
                    'html_content' => $request->input('html_content', $originalBlock->html_content),
                    'css_content' => $request->input('css_content', $originalBlock->css_content),
                    'js_content' => $request->input('js_content', $originalBlock->js_content),
                    'sort_order' => $request->input('sort_order', $originalBlock->sort_order),
                    'is_active' => $request->input('is_active', $originalBlock->is_active)
                ];
            }
        }
        
        return view('blocks.create', compact('categories', 'duplicateData'));
    }

    /**
     * Сохранение нового блока
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'html_content' => 'required|string',
            'css_content' => 'nullable|string',
            'js_content' => 'nullable|string',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $block = Block::create([
            'name' => $request->name,
            'type' => $request->type,
            'category' => $request->category,
            'description' => $request->description,
            'html_content' => $request->html_content,
            'css_content' => $request->css_content,
            'js_content' => $request->js_content,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('blocks.index')
            ->with('success', 'Блок успешно создан!');
    }

    /**
     * Отображение блока
     */
    public function show(Block $block)
    {
        return view('blocks.show', compact('block'));
    }

    /**
     * Форма редактирования блока
     */
    public function edit(Block $block)
    {
        $categories = Block::distinct()->pluck('category')->filter()->sort();
        return view('blocks.edit', compact('block', 'categories'));
    }

    /**
     * Обновление блока
     */
    public function update(Request $request, Block $block)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'html_content' => 'required|string',
            'css_content' => 'nullable|string',
            'js_content' => 'nullable|string',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $block->update([
            'name' => $request->name,
            'type' => $request->type,
            'category' => $request->category,
            'description' => $request->description,
            'html_content' => $request->html_content,
            'css_content' => $request->css_content,
            'js_content' => $request->js_content,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('blocks.index')
            ->with('success', 'Блок успешно обновлён!');
    }

    /**
     * Удаление блока
     */
    public function destroy(Block $block)
    {
        $block->delete();
        
        return redirect()->route('blocks.index')
            ->with('success', 'Блок успешно удалён!');
    }

    /**
     * Предварительный просмотр блока
     */
    public function preview(Block $block)
    {
        $html = '<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Предпросмотр блока</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        ' . $block->css_content . '
    </style>
</head>
<body>
    ' . $block->html_content . '
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    ' . ($block->js_content ? '<script>' . $block->js_content . '</script>' : '') . '
</body>
</html>';

        return response($html);
    }

    /**
     * Создание миниатюрного предпросмотра блока
     */
    public function miniPreview(Block $block)
    {
        $html = '<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Миниатюра блока</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { 
            margin: 0; 
            padding: 0;
            font-family: "Nunito", sans-serif;
            background: white;
            overflow: hidden;
            width: 1200px !important;
            min-width: 1200px !important;
            transform: scale(0.25);
            transform-origin: top left;
        }
        .container, .container-fluid { 
            max-width: 1200px !important; 
            width: 1200px !important;
            padding: 15px;
        }
        .row {
            margin: 0 -15px;
        }
        .col, .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, 
        .col-7, .col-8, .col-9, .col-10, .col-11, .col-12,
        .col-sm, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6,
        .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12,
        .col-md, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6,
        .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12,
        .col-lg, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6,
        .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12,
        .col-xl, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6,
        .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12 {
            padding: 0 15px;
        }
        h1 { font-size: 2.5rem !important; }
        h2 { font-size: 2rem !important; }
        h3 { font-size: 1.75rem !important; }
        h4 { font-size: 1.5rem !important; }
        h5 { font-size: 1.25rem !important; }
        h6 { font-size: 1rem !important; }
        .lead { font-size: 1.25rem !important; }
        p, div, span, li { 
            font-size: 1rem !important; 
        }
        .btn { 
            padding: 0.375rem 0.75rem !important; 
            font-size: 1rem !important; 
        }
        .py-5 {
            padding-top: 3rem !important;
            padding-bottom: 3rem !important;
        }
        .py-4 {
            padding-top: 1.5rem !important;
            padding-bottom: 1.5rem !important;
        }
        .py-3 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }
        .navbar {
            padding: 0.5rem 1rem !important;
        }
        .card {
            margin-bottom: 1.5rem;
        }
        .card-body {
            padding: 1.25rem;
        }
        img { 
            max-width: 100%; 
            height: auto; 
        }
        /* Применяем пользовательские стили */
        ' . $block->css_content . '
    </style>
</head>
<body>
    <div class="preview-wrapper">
        ' . $block->html_content . '
    </div>
</body>
</html>';

        return response($html)->header('Content-Type', 'text/html');
    }
}
