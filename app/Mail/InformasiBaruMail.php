<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Informasi;

class InformasiBaruMail extends Mailable
{
    use Queueable, SerializesModels;

    public $informasi;
    
    public function __construct(Informasi $informasi)
    {
        $this->informasi = $informasi;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Informasi Baru Mail: ' . $this->informasi->judul,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.informasi-baru',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
