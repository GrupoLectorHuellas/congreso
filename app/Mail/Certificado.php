<?php

namespace Congreso\Mail;

use Congreso\Inscripcion;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Certificado extends Mailable
{
    use Queueable, SerializesModels;
    public $inscripcion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Inscripcion $inscripcion)
    {
        $this->inscripcion=$inscripcion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('administracion.emails.certificado')
            ->subject('Evento Aprobado');


    }
}
