<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendPaymentAccountEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $email;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $email, $url)
    {
        $this->data = $data;
        $this->email = $email;
        $this->url = $url;

    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Send Payment Account Email',
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
            view: 'mail.send-payment-account',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */

    public function build()
    {

        return $this->with([
            'data' => $this->data,
            'url' => $this->url
        ])->to($this->email);

    }
}
