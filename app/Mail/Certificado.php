<?php

namespace Congreso\Mail;

use Congreso\Firma;
use Congreso\Inscripcion;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Barryvdh\DomPDF\Facade as PDF;
ini_set('max_execution_time', 180); //3 minutes


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
        $firmas = Firma::where('estado',1)->get();

        $inscripcion = Inscripcion::find(1);
        $pdf = PDF::loadView('administracion.pdf.certificado',['firmas'=>$firmas,'inscripcion'=>$inscripcion])->setPaper('a4', 'landscape')->stream();
        //enviar correo
        return $this->view('administracion.emails.certificado')
            ->subject('Evento Aprobado')
             ->attachData($pdf,"invoice.pdf");


    }
}
