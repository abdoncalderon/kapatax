<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestForApprovalReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $needRequest;

    public $subject;

    public function __construct($needRequest)
    {
        $this->needRequest = $needRequest;

        $this->subject = __('messages.requestForApprovalReceived');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('session.emails.requestForApprovalReceived');
    }
}
