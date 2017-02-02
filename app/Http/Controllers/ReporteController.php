<?php

namespace Congreso\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Congreso\Evento;
use Illuminate\Http\Request;

class ReporteController extends Controller
{

    public function prueba(){
        $pdf = PDF::loadView('administracion.pdf.pruebla');
        return $pdf->download('archivo.pdf');
    }

    public function getAprobados(){
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        //$eventos = Evento::where('estado',1)->where('fecha_fin', '<', $date)->get();
        $eventos = Evento::where('estado',1)->get();
        return View('administracion.reportes.aprobados',compact('eventos'));
    }

    public function postAprobados(Request $request){

        $this->validate($request, [
            'evento_id'=>'required',
        ]);

        $evento = Evento::find($request->input('evento_id'));
        $total_evento=0;

        foreach($evento->temarios as $temario){
            $total_evento = $total_evento+$temario->duracion;
       }
        dd($total_evento);

        foreach($evento->asistencias as $asistencia){
            dd($asistencia->id);
            dd($total_evento);
        }
        dd($total_evento);
    }

    public function getReprobados(){
        return View('administracion.reportes.reprobados');
    }
}
