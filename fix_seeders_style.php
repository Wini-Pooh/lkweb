<?php

/**
 * Скрипт для исправления стилизации в сидерах
 * Исправляет отступы HTML и форматирование CSS
 */

class SeederStyleFixer
{
    private $seederDirectory;
    
    public function __construct($seederDirectory)
    {
        $this->seederDirectory = $seederDirectory;
    }
    
    /**
     * Исправляет HTML отступы - нормализует к 4 пробелам на уровень
     */
    private function fixHtmlIndentation($html)
    {
        // Разбиваем на строки
        $lines = explode("\n", $html);
        $fixedLines = [];
        
        foreach ($lines as $line) {
            // Пропускаем пустые строки
            if (trim($line) === '') {
                $fixedLines[] = '';
                continue;
            }
            
            // Подсчитываем количество ведущих пробелов
            $leadingSpaces = strlen($line) - strlen(ltrim($line, ' '));
            $content = ltrim($line, ' ');
            
            // Нормализуем отступы: каждые 4+ пробела = 1 уровень отступа
            if ($leadingSpaces >= 8) {
                $indentLevel = 2; // Максимум 2 уровня для сидеров
            } elseif ($leadingSpaces >= 4) {
                $indentLevel = 1;
            } else {
                $indentLevel = 0;
            }
            
            $fixedLines[] = str_repeat('    ', $indentLevel) . $content;
        }
        
        return implode("\n", $fixedLines);
    }
    
    /**
     * Форматирует CSS из однострочного в многострочный
     */
    private function formatCss($css)
    {
        // Удаляем лишние пробелы
        $css = trim($css);
        
        // Если CSS пустой, возвращаем отформатированную пустую строку
        if (empty($css)) {
            return '';
        }
        
        // Разбиваем CSS на правила
        $rules = explode('}', $css);
        $formattedRules = [];
        
        foreach ($rules as $rule) {
            $rule = trim($rule);
            if (empty($rule)) continue;
            
            // Разбиваем селектор и свойства
            $parts = explode('{', $rule);
            if (count($parts) !== 2) continue;
            
            $selector = trim($parts[0]);
            $properties = trim($parts[1]);
            
            // Форматируем селектор
            $formattedRule = "\n" . $selector . " {\n";
            
            // Разбиваем свойства
            $propertyList = explode(';', $properties);
            foreach ($propertyList as $property) {
                $property = trim($property);
                if (!empty($property)) {
                    $formattedRule .= "    " . $property . ";\n";
                }
            }
            
            $formattedRule .= "}";
            $formattedRules[] = $formattedRule;
        }
        
        return implode("\n", $formattedRules);
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
                $fixedHtml = $this->fixHtmlIndentation($htmlContent);
                return "'html_content' => '" . $fixedHtml . "'";
            },
            $content
        );
        
        // Ищем и исправляем CSS контент
        $content = preg_replace_callback(
            "/'css_content' => '(.*?)'/s",
            function($matches) {
                $cssContent = $matches[1];
                $formattedCss = $this->formatCss($cssContent);
                return "'css_content' => '" . $formattedCss . "'";
            },
            $content
        );
        
        // Сохраняем файл только если были изменения
        if ($content !== $originalContent) {
            file_put_contents($filePath, $content);
            echo "Исправлен файл: " . basename($filePath) . "\n";
            return true;
        }
        
        echo "Файл не требует исправлений: " . basename($filePath) . "\n";
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
        echo "Исправлено файлов: $fixedCount\n";
    }
}

// Использование
$seederDir = __DIR__ . '/database/seeders';
$fixer = new SeederStyleFixer($seederDir);
$fixer->fixAllSeeders();

echo "\nИсправление стилизации завершено!\n";
