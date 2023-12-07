<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderRejectionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $update_status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($update_status)
    {
        $this->update_status = $update_status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reject');
    }
}
