<?php

/**
 * Скрипт для улучшения стилизации блоков в сидерах
 * Добавляет современные элементы дизайна: тени, границы, эффекты при наведении
 */

class BlockStylingImprover
{
    private $seederDirectory;
    
    public function __construct($seederDirectory)
    {
        $this->seederDirectory = $seederDirectory;
    }
    
    /**
     * Улучшает CSS стили для карточек
     */
    private function improveCardStyles($css)
    {
        // Паттерны для улучшения
        $improvements = [
            // Добавляем тени и границы для карточек
            '/\.([^{]*card[^{]*)\s*\{([^}]*background[^;]*;[^}]*)\}/i' => function($matches) {
                $selector = $matches[1];
                $properties = $matches[2];
                
                // Добавляем современные стили
                $newProperties = $properties;
                
                if (!preg_match('/border-radius/i', $properties)) {
                    $newProperties .= "\n    border-radius: 12px;";
                }
                
                if (!preg_match('/box-shadow/i', $properties)) {
                    $newProperties .= "\n    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);";
                }
                
                if (!preg_match('/border:/i', $properties)) {
                    $newProperties .= "\n    border: 1px solid #e9ecef;";
                }
                
                if (!preg_match('/transition/i', $properties)) {
                    $newProperties .= "\n    transition: transform 0.3s ease, box-shadow 0.3s ease;";
                }
                
                return ".{$selector} {{$newProperties}}";
            },
            
            // Улучшаем эффекты при наведении
            '/\.([^{]*card[^{]*):hover\s*\{([^}]*)\}/i' => function($matches) {
                $selector = $matches[1];
                $properties = $matches[2];
                
                $newProperties = $properties;
                
                if (!preg_match('/transform/i', $properties)) {
                    $newProperties .= "\n    transform: translateY(-8px);";
                }
                
                if (!preg_match('/box-shadow/i', $properties)) {
                    $newProperties .= "\n    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);";
                }
                
                return ".{$selector}:hover {{$newProperties}}";
            },
            
            // Улучшаем item и block элементы
            '/\.([^{]*(?:item|block)[^{]*)\s*\{([^}]*background[^;]*;[^}]*)\}/i' => function($matches) {
                $selector = $matches[1];
                $properties = $matches[2];
                
                $newProperties = $properties;
                
                if (!preg_match('/border-radius/i', $properties)) {
                    $newProperties .= "\n    border-radius: 8px;";
                }
                
                if (!preg_match('/box-shadow/i', $properties)) {
                    $newProperties .= "\n    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);";
                }
                
                if (!preg_match('/border:/i', $properties)) {
                    $newProperties .= "\n    border: 1px solid #e9ecef;";
                }
                
                return ".{$selector} {{$newProperties}}";
            }
        ];
        
        foreach ($improvements as $pattern => $replacement) {
            if (is_callable($replacement)) {
                $css = preg_replace_callback($pattern, $replacement, $css);
            }
        }
        
        return $css;
    }
    
    /**
     * Обрабатывает один файл сидера
     */
    public function improveSeedFile($filePath)
    {
        if (!file_exists($filePath)) {
            echo "Файл не найден: {$filePath}\n";
            return false;
        }
        
        $content = file_get_contents($filePath);
        
        // Находим CSS контент и улучшаем его
        $pattern = "/'css_content'\s*=>\s*'([^']*(?:\\\\'[^']*)*)'/s";
        
        $content = preg_replace_callback($pattern, function($matches) {
            $cssContent = $matches[1];
            
            // Декодируем экранированные кавычки
            $cssContent = str_replace("\\'", "'", $cssContent);
            
            // Улучшаем стили
            $improvedCss = $this->improveCardStyles($cssContent);
            
            // Кодируем обратно
            $improvedCss = str_replace("'", "\\'", $improvedCss);
            
            return "'css_content' => '{$improvedCss}'";
        }, $content);
        
        // Сохраняем файл
        if (file_put_contents($filePath, $content)) {
            echo "✅ Улучшен: " . basename($filePath) . "\n";
            return true;
        } else {
            echo "❌ Ошибка при сохранении: " . basename($filePath) . "\n";
            return false;
        }
    }
    
    /**
     * Обрабатывает все файлы сидеров
     */
    public function improveAllSeeders()
    {
        $files = glob($this->seederDirectory . '/*BlockSeeder.php');
        
        if (empty($files)) {
            echo "Не найдено файлов сидеров в директории: {$this->seederDirectory}\n";
            return;
        }
        
        echo "Найдено " . count($files) . " файлов сидеров\n";
        echo "Начинаем улучшение стилизации...\n\n";
        
        $successCount = 0;
        
        foreach ($files as $file) {
            if ($this->improveSeedFile($file)) {
                $successCount++;
            }
        }
        
        echo "\n✨ Улучшение завершено!\n";
        echo "Обработано успешно: {$successCount} из " . count($files) . " файлов\n";
    }
    
    /**
     * Добавляет общие улучшения CSS
     */
    private function addGeneralImprovements($css)
    {
        $generalStyles = '
/* Общие улучшения для всех блоков */
.container {
    max-width: 1200px;
}

/* Улучшенные кнопки */
.btn {
    border-radius: 8px;
    font-weight: 500;
    padding: 12px 24px;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

/* Улучшенные формы */
.form-control, .form-select {
    border-radius: 8px;
    border: 1px solid #e9ecef;
    padding: 12px 15px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

/* Улучшенные заголовки */
h1, h2, h3, h4, h5, h6 {
    font-weight: 600;
    line-height: 1.2;
}

/* Улучшенные изображения */
img {
    border-radius: 8px;
}';
        
        return $css . $generalStyles;
    }
}

// Использование
$seederDir = __DIR__ . '/database/seeders';
$improver = new BlockStylingImprover($seederDir);
$improver->improveAllSeeders();

echo "\n🎨 Стилизация блоков завершена!\n";
echo "Все блоки теперь имеют современные карточки с тенями, границами и эффектами при наведении.\n";
