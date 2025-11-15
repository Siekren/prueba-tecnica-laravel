<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ToyInformationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $toyData;

    /**
     * Crea una nueva instancia del mensaje.
     */
    public function __construct(array $toyData)
    {
        $this->toyData = $toyData;
    }

    /**
     * Obtiene el sobre del mensaje.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Información del juguete',
            // El remitente se puede definir aquí o en .env
            from: 'info@mailtrap.io',
        );
    }

    /**
     * Obtiene la definición del contenido del mensaje.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.toy-info', // Una vista Blade para el cuerpo del correo
            with: [
                'toyName' => $this->toyData['toy_name'],
                'toyPrice' => $this->toyData['toy_price'],
                'toyUrl' => $this->toyData['url'],
            ],
        );
    }

    /**
     * Define los adjuntos para el mensaje.
     */
    public function attachments(): array
    {
        return [];
    }
}
