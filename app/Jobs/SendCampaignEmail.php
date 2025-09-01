<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\CampaignMail;
use Illuminate\Support\Facades\Log;

class SendCampaignEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public array $emails;
    public string $subject;
    public string $previewText;

    public function __construct(array $emails, string $subject, ?string $previewText = null)
    {
        $this->emails = $emails;
        $this->subject = $subject;
        // безопасно приводим к строке, даже если передали null
        $this->previewText = (string) ($previewText ?? '');
        $this->timeout = 300;
    }

    public function handle(): void
    {
        // Проверка конфигурации почты (чтобы не пытаться отправлять при незаполненном env)
        $mailHost = config('mail.mailers.smtp.host') ?? env('MAIL_HOST');
        $mailPort = config('mail.mailers.smtp.port') ?? env('MAIL_PORT');

        if (empty($mailHost) || empty($mailPort)) {
            Log::error('Mail env not configured for campaign sending', [
                'mail_host' => $mailHost,
                'mail_port' => $mailPort,
                'tip' => 'Установите MAIL_HOST и MAIL_PORT в .env (например 127.0.0.1:1025 для локального Mailpit) и перезапустите воркер очереди.'
            ]);
            return;
        }

        foreach ($this->emails as $email) {
            try {
                Mail::to($email)->send(new CampaignMail($this->subject, $this->previewText, $email));
            } catch (\Throwable $e) {
                // Логируем полную ошибку
                Log::error('Campaign send failed', [
                    'email' => $email,
                    'error' => $e->getMessage(),
                    'exception' => get_class($e),
                ]);

                // Если это типичные ошибки разрешения имени / соединения — даём явную подсказку
                $msg = mb_strtolower($e->getMessage());
                if (str_contains($msg, 'getaddrinfo') ||
                    str_contains($msg, 'could not find host') ||
                    str_contains($msg, 'connection could not be established') ||
                    str_contains($msg, 'getaddrinfo failed')) {
                    Log::info('Mail transport issue detected. Suggestion: проверьте MAIL_HOST и MAIL_PORT в .env и перезапустите воркер (php artisan config:clear && php artisan queue:restart).');
                }
            }

            // Троттлинг между отправками
            usleep(200000);
        }
    }
}
