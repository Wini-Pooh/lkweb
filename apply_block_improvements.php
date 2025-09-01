<?php

/**
 * Финальный скрипт для применения всех улучшений стилизации
 * Применяет современные CSS стили ко всем блокам сидеров
 */

require_once __DIR__ . '/global_block_styles.php';

class FinalBlockStyleImprover
{
    private $seederDirectory;
    private $processedFiles = 0;
    private $totalFiles = 0;
    
    public function __construct($seederDirectory)
    {
        $this->seederDirectory = $seederDirectory;
    }
    
    /**
     * Улучшает отдельные CSS правила
     */
    private function improveSpecificRules($css)
    {
        $improvements = [
            // Улучшение границ
            '/border:\s*2px solid #000;/' => 'border: 1px solid #e9ecef;',
            '/border:\s*1px solid #333;/' => 'border: 1px solid #e9ecef;',
            '/border-color:\s*#000;/' => 'border-color: #dee2e6;',
            
            // Улучшение теней
            '/box-shadow:\s*none;/' => 'box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);',
            
            // Улучшение фонов
            '/background-color:\s*#fff\s*!important;/' => 'background-color: #fff !important; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);',
            
            // Улучшение переходов
            '/transition:\s*transform[^;]*;/' => 'transition: all 0.3s ease;',
            
            // Улучшение отступов для карточек
            '/padding:\s*30px 20px;/' => 'padding: 2rem 1.5rem;',
            '/padding:\s*2rem;/' => 'padding: 2rem; border-radius: 12px;',
        ];
        
        foreach ($improvements as $pattern => $replacement) {
            $css = preg_replace($pattern, $replacement, $css);
        }
        
        return $css;
    }
    
    /**
     * Добавляет недостающие стили для карточек
     */
    private function addMissingCardStyles($css)
    {
        // Ищем селекторы карточек без box-shadow
        $cardSelectors = [
            'service-card', 'pricing-card', 'team-member', 'gallery-item',
            'testimonial-card', 'contact-form', 'info-item', 'process-step',
            'faq-item', 'cta-form-container', 'about-image', 'company-stats',
            'stat-item', 'pricing-card', 'member-photo', 'accordion-item'
        ];
        
        foreach ($cardSelectors as $selector) {
            // Проверяем, есть ли уже box-shadow для этого селектора
            if (preg_match("/\.{$selector}[^{]*\{[^}]*box-shadow[^}]*\}/i", $css)) {
                continue; // Уже есть box-shadow
            }
            
            // Проверяем, есть ли селектор в CSS
            if (preg_match("/\.{$selector}(?:\s|[^a-zA-Z0-9-])/i", $css)) {
                // Добавляем улучшения
                $addition = "\n\n.{$selector} {\n";
                $addition .= "    border-radius: 12px;\n";
                $addition .= "    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);\n";
                $addition .= "    transition: all 0.3s ease;\n";
                $addition .= "    overflow: hidden;\n";
                $addition .= "}\n";
                
                $addition .= "\n.{$selector}:hover {\n";
                $addition .= "    transform: translateY(-5px);\n";
                $addition .= "    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);\n";
                $addition .= "}";
                
                $css .= $addition;
            }
        }
        
        return $css;
    }
    
    /**
     * Обрабатывает один файл сидера
     */
    public function processSeederFile($filePath)
    {
        if (!file_exists($filePath)) {
            echo "❌ Файл не найден: {$filePath}\n";
            return false;
        }
        
        $content = file_get_contents($filePath);
        $modified = false;
        
        // Обрабатываем каждый CSS блок в файле
        $pattern = "/'css_content'\s*=>\s*'([^']*(?:\\\\'[^']*)*)'/s";
        
        $content = preg_replace_callback($pattern, function($matches) use (&$modified) {
            $cssContent = $matches[1];
            
            // Декодируем экранированные кавычки
            $originalCss = str_replace("\\'", "'", $cssContent);
            
            // Применяем улучшения
            $improvedCss = $this->improveSpecificRules($originalCss);
            $improvedCss = $this->addMissingCardStyles($improvedCss);
            
            // Проверяем, изменился ли CSS
            if ($originalCss !== $improvedCss) {
                $modified = true;
            }
            
            // Кодируем обратно
            $improvedCss = str_replace("'", "\\'", $improvedCss);
            
            return "'css_content' => '{$improvedCss}'";
        }, $content);
        
        // Сохраняем файл только если были изменения
        if ($modified) {
            if (file_put_contents($filePath, $content)) {
                echo "✅ Улучшен: " . basename($filePath) . "\n";
                $this->processedFiles++;
                return true;
            } else {
                echo "❌ Ошибка при сохранении: " . basename($filePath) . "\n";
                return false;
            }
        } else {
            echo "ℹ️  Пропущен (уже улучшен): " . basename($filePath) . "\n";
            return true;
        }
    }
    
    /**
     * Обрабатывает все файлы сидеров
     */
    public function processAllSeeders()
    {
        $files = glob($this->seederDirectory . '/*BlockSeeder.php');
        
        if (empty($files)) {
            echo "❌ Не найдено файлов сидеров в директории: {$this->seederDirectory}\n";
            return;
        }
        
        $this->totalFiles = count($files);
        
        echo "🎨 УЛУЧШЕНИЕ СТИЛИЗАЦИИ БЛОКОВ\n";
        echo "=====================================\n";
        echo "Найдено файлов: {$this->totalFiles}\n";
        echo "Начинаем обработку...\n\n";
        
        foreach ($files as $file) {
            $this->processSeederFile($file);
        }
        
        echo "\n🎉 ЗАВЕРШЕНО!\n";
        echo "=====================================\n";
        echo "Обработано файлов: {$this->processedFiles} из {$this->totalFiles}\n";
        echo "Пропущено (уже улучшены): " . ($this->totalFiles - $this->processedFiles) . "\n\n";
        
        echo "✨ Применены улучшения:\n";
        echo "   • Современные тени и границы\n";
        echo "   • Плавные анимации при наведении\n";
        echo "   • Округленные углы карточек\n";
        echo "   • Улучшенная цветовая схема\n";
        echo "   • Адаптивные эффекты\n\n";
        
        echo "📝 Рекомендации:\n";
        echo "   • Запустите миграции: php artisan migrate:fresh --seed\n";
        echo "   • Очистите кэш: php artisan cache:clear\n";
        echo "   • Проверьте блоки в конструкторе сайтов\n";
    }
    
    /**
     * Создает резервную копию перед изменениями
     */
    public function createBackup()
    {
        $backupDir = $this->seederDirectory . '_backup_' . date('Y-m-d_H-i-s');
        
        if (!is_dir($backupDir)) {
            mkdir($backupDir, 0777, true);
        }
        
        $files = glob($this->seederDirectory . '/*BlockSeeder.php');
        $copiedFiles = 0;
        
        foreach ($files as $file) {
            $filename = basename($file);
            if (copy($file, $backupDir . '/' . $filename)) {
                $copiedFiles++;
            }
        }
        
        echo "💾 Создана резервная копия: {$backupDir}\n";
        echo "   Скопировано файлов: {$copiedFiles}\n\n";
        
        return $backupDir;
    }
}

// Запуск скрипта
echo "🚀 ЗАПУСК УЛУЧШЕНИЯ СТИЛИЗАЦИИ БЛОКОВ\n";
echo "=====================================\n\n";

$seederDir = __DIR__ . '/database/seeders';
$improver = new FinalBlockStyleImprover($seederDir);

// Создаем резервную копию
echo "1️⃣ Создание резервной копии...\n";
$backupDir = $improver->createBackup();

// Обрабатываем все сидеры
echo "2️⃣ Применение улучшений...\n";
$improver->processAllSeeders();

echo "🎊 Все готово! Ваши блоки теперь выглядят современно и профессионально.\n";
echo "Резервная копия сохранена в: {$backupDir}\n";
