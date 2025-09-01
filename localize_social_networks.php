<?php

/**
 * Скрипт для локализации социальных сетей в блоках сидеров
 * Заменяет английские названия на русские: VK, WhatsApp, Telegram и т.д.
 */

class SocialNetworkLocalizer
{
    private $seederDirectory;
    private $replacements = [
        // Названия социальных сетей
        'Facebook' => 'ВКонтакте',
        'Twitter' => 'Telegram',
        'LinkedIn' => 'WhatsApp',
        'Instagram' => 'Одноклассники',
        'YouTube' => 'YouTube',
        
        // Иконки FontAwesome для российских соцсетей
        'fab fa-facebook-f' => 'fab fa-vk',
        'fab fa-facebook' => 'fab fa-vk',
        'fab fa-twitter' => 'fab fa-telegram',
        'fab fa-linkedin-in' => 'fab fa-whatsapp',
        'fab fa-linkedin' => 'fab fa-whatsapp',
        'fab fa-instagram' => 'fab fa-odnoklassniki',
        
        // Дополнительные замены для русских платформ
        'Google+' => 'Яндекс.Дзен',
        'Pinterest' => 'Яндекс.Дзен',
        'Snapchat' => 'TikTok',
        'TikTok' => 'TikTok',
    ];
    
    private $processedFiles = 0;
    
    public function __construct($seederDirectory)
    {
        $this->seederDirectory = $seederDirectory;
    }
    
    /**
     * Локализует социальные сети в файле сидера
     */
    public function localizeSeedFile($filePath)
    {
        if (!file_exists($filePath)) {
            echo "❌ Файл не найден: {$filePath}\n";
            return false;
        }
        
        $content = file_get_contents($filePath);
        $originalContent = $content;
        
        // Применяем замены
        foreach ($this->replacements as $english => $russian) {
            $content = str_replace($english, $russian, $content);
        }
        
        // Если были изменения, сохраняем файл
        if ($content !== $originalContent) {
            file_put_contents($filePath, $content);
            $fileName = basename($filePath);
            echo "✅ Локализован: {$fileName}\n";
            $this->processedFiles++;
            return true;
        }
        
        return false;
    }
    
    /**
     * Локализует все файлы сидеров
     */
    public function localizeAllSeeders()
    {
        $seederFiles = glob($this->seederDirectory . '/*BlockSeeder.php');
        
        echo "🔍 Найдено файлов сидеров: " . count($seederFiles) . "\n\n";
        
        foreach ($seederFiles as $file) {
            $this->localizeSeedFile($file);
        }
        
        echo "\n📊 Результат:\n";
        echo "   Обработано файлов: {$this->processedFiles}\n";
    }
    
    /**
     * Создает резервную копию файлов
     */
    public function createBackup()
    {
        $backupDir = $this->seederDirectory . '_backup_' . date('Y-m-d_H-i-s');
        
        if (!file_exists($backupDir)) {
            mkdir($backupDir, 0755, true);
        }
        
        $seederFiles = glob($this->seederDirectory . '/*.php');
        
        foreach ($seederFiles as $file) {
            $fileName = basename($file);
            copy($file, $backupDir . '/' . $fileName);
        }
        
        echo "💾 Резервная копия создана: {$backupDir}\n\n";
        return $backupDir;
    }
    
    /**
     * Добавляет современные русские социальные сети
     */
    public function addModernRussianSocials($filePath)
    {
        if (!file_exists($filePath)) {
            return false;
        }
        
        $content = file_get_contents($filePath);
        
        // Добавляем Telegram и WhatsApp в блоки, где есть социальные сети
        $modernSocials = [
            'Telegram' => 'fab fa-telegram',
            'WhatsApp' => 'fab fa-whatsapp',
            'Viber' => 'fab fa-viber',
            'ВКонтакте' => 'fab fa-vk',
        ];
        
        // Ищем места где есть социальные сети и добавляем современные
        if (strpos($content, 'social-link') !== false) {
            // Добавляем дополнительные иконки после существующих
            $additionalIcons = '';
            foreach ($modernSocials as $name => $icon) {
                $additionalIcons .= "\n                    <a href=\"#\" class=\"social-link me-3\"><i class=\"{$icon}\"></i></a>";
            }
            
            // Заменяем последнюю социальную ссылку, добавляя новые
            $pattern = '/(<a href="#" class="social-link[^>]*><i class="[^"]*"><\/i><\/a>)(\s*<\/div>)/';
            $replacement = '$1' . $additionalIcons . '$2';
            $content = preg_replace($pattern, $replacement, $content);
        }
        
        file_put_contents($filePath, $content);
    }
}

// Запуск скрипта
echo "🇷🇺 ЛОКАЛИЗАЦИЯ СОЦИАЛЬНЫХ СЕТЕЙ\n";
echo "=================================\n\n";

$seederDir = __DIR__ . '/database/seeders';
$localizer = new SocialNetworkLocalizer($seederDir);

// Создаем резервную копию
$backupDir = $localizer->createBackup();

// Локализуем все сидеры
$localizer->localizeAllSeeders();

echo "\n🎉 Локализация завершена успешно!\n";
echo "✨ Теперь все социальные сети используют русские названия и иконки:\n";
echo "   • Facebook → ВКонтакте (VK)\n";
echo "   • Twitter → Telegram\n";
echo "   • LinkedIn → WhatsApp\n";
echo "   • Instagram → Одноклассники\n\n";
echo "💾 Резервная копия: {$backupDir}\n";
