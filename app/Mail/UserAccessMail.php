<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserAccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data = null;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'User Access Mail',
        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.userAccessMail',
        );
    }

    public function attachments()
    {
        return [];
    }
}
