<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Jobs\SendCampaignEmail;

class EmailCampaignController extends Controller
{
    public function index()
    {
        // Сканируем папку для файлов базы (txt)
        $baseDir = base_path('baseemail'); // C:\OSPanel\domains\konstructor\baseemail
        $serverFiles = [];

        if (is_dir($baseDir)) {
            $files = scandir($baseDir);
            foreach ($files as $f) {
                if (in_array($f, ['.', '..'])) continue;
                $ext = pathinfo($f, PATHINFO_EXTENSION);
                if (in_array(mb_strtolower($ext), ['txt', 'csv'])) {
                    $serverFiles[] = $f;
                }
            }
        }

        return view('email-campaign.index', [
            'serverFiles' => $serverFiles,
        ]);
    }

    public function preview(Request $request)
    {
        // демонстрация письма в браузере
        $data = [
            'subject' => $request->get('subject', 'Создайте сайт, который продаёт — консультация'),
            'preview_text' => $request->get('preview_text', 'Короткое описание письма'),
            'content' => '<p>Это пример контента письма. Проверка предпросмотра и preheader.</p>',
            'unsubscribeUrl' => url('/unsubscribe')
        ];
        return view('email-campaign.preview', $data);
    }

    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'preview_text' => 'nullable|string|max:500',
            // file - optional if server_file provided
            'file' => 'nullable|file|mimes:csv,txt|max:5120',
            'server_file' => 'nullable|string',
        ]);

        $subject = $request->input('subject');
        $previewText = $request->input('preview_text', '');

        $emails = [];

        // Если выбран серверный файл — приоритет
        $serverFile = $request->input('server_file');
        if ($serverFile) {
            $baseDir = base_path('baseemail');
            $fullPath = $baseDir . DIRECTORY_SEPARATOR . basename($serverFile);
            if (!is_file($fullPath) || !is_readable($fullPath)) {
                return redirect()->back()->with('error', 'Выбранный файл не найден или недоступен на сервере.');
            }
            // читаем построчно (txt) и парсим возможные CSV-строки
            $lines = file($fullPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                // если CSV — возьмём первое поле, иначе строка сама по себе
                $cols = str_getcsv($line);
                $raw = trim($cols[0] ?? $line);
                if ($raw && filter_var($raw, FILTER_VALIDATE_EMAIL)) {
                    $emails[] = mb_strtolower($raw);
                }
            }
        } elseif ($request->hasFile('file')) {
            $path = $request->file('file')->store('email_campaigns');
            $fullPath = storage_path('app/' . $path);

            if (($handle = fopen($fullPath, 'r')) !== false) {
                $header = fgetcsv($handle);
                $emailIndex = null;
                if ($header) {
                    foreach ($header as $i => $h) {
                        if (mb_strtolower(trim($h)) === 'email') {
                            $emailIndex = $i;
                            break;
                        }
                    }
                }
                if ($emailIndex === null) {
                    rewind($handle);
                }

                while (($row = fgetcsv($handle)) !== false) {
                    $raw = $emailIndex !== null ? ($row[$emailIndex] ?? '') : ($row[0] ?? '');
                    $email = trim($raw);
                    if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emails[] = mb_strtolower($email);
                    }
                }
                fclose($handle);
            }
        } else {
            return redirect()->back()->with('error', 'Нужно загрузить файл или выбрать серверный файл.');
        }

        $emails = array_values(array_unique($emails));
        $total = count($emails);
        if ($total === 0) {
            return redirect()->back()->with('error', 'В файле не найдено корректных email адресов.');
        }

        // разбиваем на чанки и диспатчим джобы с маленькой задержкой между батчами
        $chunkSize = 50; // при необходимости уменьшите
        $chunks = array_chunk($emails, $chunkSize);

        foreach ($chunks as $i => $chunk) {
            $delaySeconds = $i * 5;
            SendCampaignEmail::dispatch($chunk, $subject, $previewText)
                ->delay(now()->addSeconds($delaySeconds));
        }

        $batches = count($chunks);
        return redirect()->back()->with('success', "Запущена рассылка для {$total} получателей ({$batches} батчей). Запустите воркер: php artisan queue:work");
    }
}
