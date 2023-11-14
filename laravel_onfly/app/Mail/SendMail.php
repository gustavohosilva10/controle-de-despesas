<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $sendMail;

    public function __construct($request)
    {
        $this->sendMail = $request;
    }

    public function content(): Content
    {
        return new Content(
            view: 'email',
            with: ['despesas' => $this->sendMail]
        );
    }
}