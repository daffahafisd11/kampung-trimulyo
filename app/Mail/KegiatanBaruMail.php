<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use App\Models\kegiatan;

class KegiatanBaruMail extends Mailable
{
    use Queueable, SerializesModels;

    public $kegiatan;

    public function __construct(Kegiatan $kegiatan)
    {
        $this->kegiatan = $kegiatan;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Kegiatan Baru: ' . $this->kegiatan->nama_kegiatan,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.kegiatan-baru',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
