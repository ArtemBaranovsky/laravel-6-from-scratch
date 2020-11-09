<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMe extends Mailable
{
    use Queueable, SerializesModels;

    public $topic;

    /**
     * Create a new message instance.
     * @param $topic
     * @return void
     */
    public function __construct($topic)
    {
        $this->topic = $topic;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->view('emails.contact-me')
        return $this->markdown('emails.contact-me')
            ->subject('More information about the '.$this->topic);
//            ->later()
//            ->attachments()
//            ->bcc()
//            ->cc();
    }
}
