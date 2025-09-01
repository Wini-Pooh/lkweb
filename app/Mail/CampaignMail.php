<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CampaignMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $subjectText;
    public string $previewText;
    public string $recipient;

    public function __construct(string $subjectText, string $previewText, string $recipient)
    {
        $this->subjectText = $subjectText;
        $this->previewText = $previewText;
        $this->recipient = $recipient;
    }

    public function build()
    {
        $unsubscribe = url('/unsubscribe?email=' . urlencode($this->recipient));

        $this->subject($this->subjectText)
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->view('email-campaign.mail')
            ->text('email-campaign.mail_plain')
            ->with([
                'preview_text' => $this->previewText,
                'unsubscribeUrl' => $unsubscribe,
            ])
            ->withSymfonyMessage(function ($message) use ($unsubscribe) {
                // добавляем заголовок List-Unsubscribe для улучшения доставки
                $message->getHeaders()->addTextHeader('List-Unsubscribe', '<' . $unsubscribe . '>, <mailto:' . config('mail.from.address') . '>');
            });

        return $this;
    }
}
