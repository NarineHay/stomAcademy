<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AreAnyQuestionFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $areAnyQuestionForm;

    public function __construct($arr)
    {
        $this->areAnyQuestionForm = $arr;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: "admin@stom.mawcompany.com",
            subject: 'Остались вопросы?',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.areAnyQuestionForm',
            with: [
            'name' => $this->areAnyQuestionForm['name'],
            'email' => $this->areAnyQuestionForm['email'],
            'phone' => $this->areAnyQuestionForm['phone'],
            'question' => $this->areAnyQuestionForm['question'],
        ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
