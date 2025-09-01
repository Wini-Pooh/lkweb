<?php

/**
 * Скрипт для правильного форматирования HTML в сидерах
 */

class HtmlFormatter
{
    /**
     * Форматирует HTML с правильными отступами на основе вложенности тегов
     */
    public function formatHtml($html)
    {
        // Убираем лишние пробелы и переносы строк в начале и конце
        $html = trim($html);
        
        if (empty($html)) {
            return '';
        }
        
        // Разбиваем на строки и убираем все отступы
        $lines = array_map('trim', explode("\n", $html));
        $lines = array_filter($lines, function($line) {
            return !empty($line);
        });
        
        $formatted = [];
        $indentLevel = 0;
        $indent = '    '; // 4 пробела
        
        foreach ($lines as $line) {
            $trimmedLine = trim($line);
            
            // Пропускаем пустые строки
            if (empty($trimmedLine)) {
                continue;
            }
            
            // Проверяем, является ли это закрывающим тегом
            if (preg_match('/^<\/[^>]+>/', $trimmedLine)) {
                $indentLevel = max(0, $indentLevel - 1);
            }
            
            // Добавляем строку с правильным отступом
            $formatted[] = str_repeat($indent, $indentLevel) . $trimmedLine;
            
            // Проверяем, является ли это открывающим тегом (но не самозакрывающимся)
            if (preg_match('/^<[^\/][^>]*[^\/]>/', $trimmedLine) && 
                !preg_match('/^<(br|hr|img|input|meta|link|area|base|col|embed|source|track|wbr)[^>]*\/?>/i', $trimmedLine)) {
                $indentLevel++;
            }
        }
        
        return "\n" . implode("\n", $formatted) . "\n";
    }
    
    /**
     * Обрабатывает файл сидера
     */
    public function formatSeederFile($filePath)
    {
        if (!file_exists($filePath)) {
            echo "Файл не найден: $filePath\n";
            return false;
        }
        
        $content = file_get_contents($filePath);
        $originalContent = $content;
        
        // Ищем и форматируем HTML контент
        $content = preg_replace_callback(
            "/'html_content' => '(.*?)'/s",
            function($matches) {
                $htmlContent = $matches[1];
                $formattedHtml = $this->formatHtml($htmlContent);
                return "'html_content' => '" . $formattedHtml . "'";
            },
            $content
        );
        
        // Сохраняем файл только если были изменения
        if ($content !== $originalContent) {
            file_put_contents($filePath, $content);
            echo "HTML отформатирован: " . basename($filePath) . "\n";
            return true;
        }
        
        echo "HTML не требует форматирования: " . basename($filePath) . "\n";
        return false;
    }
    
    /**
     * Форматирует HTML во всех сидерах
     */
    public function formatAllSeeders($seederDirectory)
    {
        $seederFiles = glob($seederDirectory . '/*Seeder.php');
        $formattedCount = 0;
        
        foreach ($seederFiles as $file) {
            // Пропускаем DatabaseSeeder и TemplateSeeder
            if (in_array(basename($file), ['DatabaseSeeder.php', 'TemplateSeeder.php'])) {
                continue;
            }
            
            if ($this->formatSeederFile($file)) {
                $formattedCount++;
            }
        }
        
        echo "\nОбработано файлов: " . (count($seederFiles) - 2) . "\n";
        echo "Отформатировано файлов: $formattedCount\n";
    }
}

// Использование
$seederDir = __DIR__ . '/database/seeders';
$formatter = new HtmlFormatter();
$formatter->formatAllSeeders($seederDir);

echo "\nФорматирование HTML завершено!\n";
