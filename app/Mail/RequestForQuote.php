<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestForQuote extends Mailable
{
    use Queueable, SerializesModels;

    public $quotationRequest;

    public $subject;

    public function __construct($quotationRequest)
    {
        $this->quotationRequest = $quotationRequest;

        $this->subject = __('messages.requestForQuote');
    }

    public function build()
    {
        return $this->view('purchases.emails.requestForQuote');
    }
}
