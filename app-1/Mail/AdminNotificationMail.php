<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $adminEmailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($adminEmailData)
    {
        $this->adminEmailData = $adminEmailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.user_register')
                            ->subject('Welcome to my Website');
    }
}
