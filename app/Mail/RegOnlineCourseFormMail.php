<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegOnlineCourseFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $regOnlineCourseForm;

    public function __construct($arr)
    {
        $this->regOnlineCourseForm = $arr;
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
            subject: 'Регистрация на онлайн-курс',
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
            view: 'mail.regOnlineCourseForm',
            with: [
            'name' => $this->regOnlineCourseForm['name'],
            'email' => $this->regOnlineCourseForm['email'],
            'phone' => $this->regOnlineCourseForm['phone'],
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
