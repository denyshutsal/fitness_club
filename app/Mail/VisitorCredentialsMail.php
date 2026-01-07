<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Visitor;

class VisitorCredentialsMail extends Mailable
{
    use Queueable, SerializesModels;

    public Visitor $visitor;
    public string $password;

    public function __construct(Visitor $visitor, string $password)
    {
        $this->visitor = $visitor;
        $this->password = $password;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your access credentials',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.visitor_credentials',
            with: [
                'visitor' => $this->visitor,
                'password' => $this->password,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
