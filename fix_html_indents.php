<?php

/**
 * Скрипт для исправления HTML отступов в сидерах
 * Приводит отступы к стандартным 4 пробелам
 */

class HtmlIndentationFixer
{
    private $seederDirectory;
    
    public function __construct($seederDirectory)
    {
        $this->seederDirectory = $seederDirectory;
    }
    
    /**
     * Исправляет HTML отступы
     */
    private function fixHtmlIndentation($html)
    {
        // Разбиваем на строки
        $lines = explode("\n", $html);
        $fixedLines = [];
        
        foreach ($lines as $line) {
            // Если строка пустая, оставляем как есть
            if (trim($line) === '') {
                $fixedLines[] = '';
                continue;
            }
            
            // Подсчитываем уровень вложенности по количеству открывающих тегов
            $content = trim($line);
            
            // Определяем уровень отступа на основе структуры
            $indentLevel = 0;
            
            // Если это section - нулевой уровень
            if (strpos($content, '<section') === 0) {
                $indentLevel = 0;
            }
            // Если это div с container - первый уровень
            elseif (strpos($content, '<div class="container') === 0) {
                $indentLevel = 1;
            }
            // Если это div с row - второй уровень
            elseif (strpos($content, '<div class="row') === 0) {
                $indentLevel = 2;
            }
            // Если это div с col - третий уровень
            elseif (strpos($content, '<div class="col') === 0) {
                $indentLevel = 3;
            }
            // Остальные div - четвертый уровень
            elseif (strpos($content, '<div') === 0) {
                $indentLevel = 4;
            }
            // Заголовки и параграфы - пятый уровень
            elseif (preg_match('/^<(h[1-6]|p|ul|li|span|i|a)/', $content)) {
                $indentLevel = 5;
            }
            // Закрывающие теги - на том же уровне что и открывающие
            elseif (strpos($content, '</') === 0) {
                if (strpos($content, '</section>') === 0) {
                    $indentLevel = 0;
                } elseif (strpos($content, '</div>') === 0) {
                    // Определяем уровень по контексту предыдущих строк
                    $indentLevel = 1; // По умолчанию
                } else {
                    $indentLevel = 5;
                }
            }
            else {
                $indentLevel = 5; // По умолчанию для текста
            }
            
            // Создаем правильный отступ
            $indent = str_repeat('    ', $indentLevel);
            $fixedLines[] = $indent . $content;
        }
        
        return implode("\n", $fixedLines);
    }
    
    /**
     * Простая версия - заменяем все отступы на правильные
     */
    private function simpleFixIndentation($html)
    {
        $lines = explode("\n", $html);
        $fixedLines = [];
        
        foreach ($lines as $line) {
            if (trim($line) === '') {
                $fixedLines[] = '';
                continue;
            }
            
            $content = trim($line);
            
            // Определяем уровень отступа по тегу
            $indentLevel = 0;
            
            if (strpos($content, '<section') !== false) {
                $indentLevel = 0;
            } elseif (strpos($content, '</section>') !== false) {
                $indentLevel = 0;
            } elseif (strpos($content, '<div class="container') !== false) {
                $indentLevel = 1;
            } elseif (strpos($content, '<div class="row') !== false) {
                $indentLevel = 2;
            } elseif (strpos($content, '<div class="col') !== false) {
                $indentLevel = 3;
            } elseif (strpos($content, '<div') !== false) {
                $indentLevel = 4;
            } elseif (strpos($content, '</div>') !== false) {
                // Для закрывающих div определяем по контексту
                if (count($fixedLines) > 0) {
                    $prevLine = trim(end($fixedLines));
                    if (strpos($prevLine, '<div class="col') !== false) {
                        $indentLevel = 3;
                    } elseif (strpos($prevLine, '<div class="row') !== false) {
                        $indentLevel = 2;
                    } elseif (strpos($prevLine, '<div class="container') !== false) {
                        $indentLevel = 1;
                    } else {
                        $indentLevel = 4;
                    }
                }
            } else {
                $indentLevel = 5; // Для содержимого
            }
            
            $indent = str_repeat('    ', $indentLevel);
            $fixedLines[] = $indent . $content;
        }
        
        return implode("\n", $fixedLines);
    }
    
    /**
     * Обрабатывает один файл сидера
     */
    public function fixSeederFile($filePath)
    {
        if (!file_exists($filePath)) {
            echo "Файл не найден: $filePath\n";
            return false;
        }
        
        $content = file_get_contents($filePath);
        $originalContent = $content;
        
        // Ищем и исправляем HTML контент
        $content = preg_replace_callback(
            "/'html_content' => '(.*?)'/s",
            function($matches) {
                $htmlContent = $matches[1];
                $fixedHtml = $this->simpleFixIndentation($htmlContent);
                return "'html_content' => '" . $fixedHtml . "'";
            },
            $content
        );
        
        // Сохраняем файл только если были изменения
        if ($content !== $originalContent) {
            file_put_contents($filePath, $content);
            echo "Исправлены отступы в файле: " . basename($filePath) . "\n";
            return true;
        }
        
        echo "Файл не требует исправления отступов: " . basename($filePath) . "\n";
        return false;
    }
    
    /**
     * Обрабатывает все файлы сидеров
     */
    public function fixAllSeeders()
    {
        $seederFiles = glob($this->seederDirectory . '/*Seeder.php');
        $fixedCount = 0;
        
        foreach ($seederFiles as $file) {
            // Пропускаем DatabaseSeeder
            if (basename($file) === 'DatabaseSeeder.php') {
                continue;
            }
            
            if ($this->fixSeederFile($file)) {
                $fixedCount++;
            }
        }
        
        echo "\nОбработано файлов: " . count($seederFiles) . "\n";
        echo "Исправлено отступов в файлах: $fixedCount\n";
    }
}

// Использование
$seederDir = __DIR__ . '/database/seeders';
$fixer = new HtmlIndentationFixer($seederDir);
$fixer->fixAllSeeders();

echo "\nИсправление отступов завершено!\n";
