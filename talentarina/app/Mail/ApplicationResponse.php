<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationResponse extends Mailable
{
    use Queueable, SerializesModels;


    public $content;
    public $subject;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $content)
    {
        $this->content = $content;
        $this->subject = $subject;
    }
    
    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject($this->subject)
            ->view('emails.application-response')
            ->with([
                'content' => $this->content,
            ]);
    }
}