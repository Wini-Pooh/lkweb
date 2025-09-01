<?php

/**
 * Простой скрипт для нормализации HTML отступов в сидерах
 * Заменяет множественные пробелы на стандартные 4-пробельные отступы
 */

function normalizeHtmlIndentation($html) {
    $lines = explode("\n", $html);
    $normalizedLines = [];
    
    foreach ($lines as $line) {
        if (trim($line) === '') {
            $normalizedLines[] = '';
            continue;
        }
        
        // Убираем все ведущие пробелы и табы
        $content = ltrim($line);
        
        // Определяем уровень вложенности по тегам
        $indentLevel = 0;
        
        if (preg_match('/^<section/', $content)) {
            $indentLevel = 0;
        } elseif (preg_match('/^<\/section>/', $content)) {
            $indentLevel = 0;
        } elseif (preg_match('/^<div class="container/', $content)) {
            $indentLevel = 1;
        } elseif (preg_match('/^<div class="row/', $content)) {
            $indentLevel = 2;
        } elseif (preg_match('/^<div class="col/', $content)) {
            $indentLevel = 3;
        } elseif (preg_match('/^<div/', $content)) {
            $indentLevel = 4;
        } elseif (preg_match('/^<\/div>/', $content)) {
            $indentLevel = 1; // Будем ставить минимальный отступ для закрывающих div
        } elseif (preg_match('/^<(h[1-6]|p|ul|ol|li|span|i|a|button)/', $content)) {
            $indentLevel = 5;
        } elseif (preg_match('/^<\/(h[1-6]|p|ul|ol|li|span|i|a|button)/', $content)) {
            $indentLevel = 5;
        } else {
            $indentLevel = 5; // Текстовое содержимое
        }
        
        // Создаем отступ
        $indent = str_repeat('    ', $indentLevel);
        $normalizedLines[] = $indent . $content;
    }
    
    return implode("\n", $normalizedLines);
}

function fixSeederIndentation($filePath) {
    $content = file_get_contents($filePath);
    $originalContent = $content;
    
    // Исправляем HTML отступы
    $content = preg_replace_callback(
        "/'html_content' => '(.*?)'/s",
        function($matches) {
            return "'html_content' => '" . normalizeHtmlIndentation($matches[1]) . "'";
        },
        $content
    );
    
    if ($content !== $originalContent) {
        file_put_contents($filePath, $content);
        return true;
    }
    
    return false;
}

// Получаем все файлы сидеров
$seederFiles = glob(__DIR__ . '/database/seeders/*Seeder.php');
$fixedCount = 0;

foreach ($seederFiles as $file) {
    if (basename($file) === 'DatabaseSeeder.php') {
        continue;
    }
    
    if (fixSeederIndentation($file)) {
        echo "Исправлены отступы: " . basename($file) . "\n";
        $fixedCount++;
    } else {
        echo "Без изменений: " . basename($file) . "\n";
    }
}

echo "\nВсего исправлено файлов: $fixedCount\n";
echo "Нормализация отступов завершена!\n";
