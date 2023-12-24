<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Nette\Utils\Html;

class UserMail extends Mailable
{
    public $user;
    public $emailContent;
    use Queueable, SerializesModels;
    public $content;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user, $emailContent)
    {
        $this->user = $user;
        $this->content = $emailContent;
    }
    public function build()
    {

        // return $this->view('admin.emails.user')->with(['user' => $this->user, 'content' => $this->content]);
        return $this->view('admin.emails.user')->with(['user' => $this->user, 'content' => $this->content]);



    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // subject: 'Compose Email',
            subject: '',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'admin.emails.user',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
