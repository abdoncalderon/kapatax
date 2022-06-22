<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestForQuote extends Mailable
{
    use Queueable, SerializesModels;

    public $purchaseRequest;

    public $subject;

    public function __construct($purchaseRequest)
    {
        $this->purchaseRequest = $purchaseRequest;

        $this->subject = __('messages.requestForQuote');
    }

    public function build()
    {
        return $this->view('purchases.emails.requestForQuote');
    }
}
