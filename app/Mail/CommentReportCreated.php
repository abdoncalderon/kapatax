<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentReportCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $comment;

    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;

        $this->subject = __('messages.commentReportCreatedSubject');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('agreement.emails.commentReportCreated');
    }
}
