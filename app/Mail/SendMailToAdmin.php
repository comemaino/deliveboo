<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    // protected $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->msg = $_msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $new_msg = $this->msg;
        return $this->view('mails.send_mail_to_admin');
    }
}
