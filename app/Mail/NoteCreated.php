<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NoteCreated extends Mailable
{
    use Queueable, SerializesModels;

    // public $subject = __('messages.noteCreatedSubject');

    public $note;

    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($note)
    {
        $this->note = $note;

        $this->subject = __('messages.noteCreatedSubject');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('agreement.emails.noteCreated');
    }
}
