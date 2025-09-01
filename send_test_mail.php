<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

// Bootstrap the framework
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Use the Mail facade
use Illuminate\Support\Facades\Mail;

// Send test CampaignMail
$recipient = env('MAIL_TO') ?: env('MAIL_FROM_ADDRESS', 'w1nishko@yandex.ru');
try {
    Mail::to($recipient)->send(new App\Mail\CampaignMail('Тестовая тема', 'Тестовый preheader', $recipient));
    echo "Sent to {$recipient}\n";
} catch (\Throwable $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
