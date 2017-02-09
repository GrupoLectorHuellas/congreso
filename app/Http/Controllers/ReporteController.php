<?php

namespace Congreso\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Congreso\Evento;
use Congreso\Firma;
use Congreso\Imagen;
use Congreso\Inscripcion;
use Illuminate\Http\Request;

class ReporteController extends Controller
{

    public function certificados($id){
        $firmas = Firma::where('estado',1)->get();
        $inscripcion = Inscripcion::find($id);
        $fondo = Imagen::all()->last();
        $pdf = PDF::loadView('administracion.pdf.certificado',['firmas'=>$firmas,'inscripcion'=>$inscripcion,'fondo'=>$fondo])->setPaper('a4', 'landscape');
        return $pdf->download('archivo.pdf');
    }

    public function getAprobados(){
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        //$eventos = Evento::where('estado',1)->where('fecha_fin', '<', $date)->get();
        $eventos = Evento::where('estado',1)->get();
        return View('administracion.reportes.aprobados',compact('eventos'));
    }
    public function getReprobados(){
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        //$eventos = Evento::where('estado',1)->where('fecha_fin', '<', $date)->get();
        $eventos = Evento::where('estado',1)->get();
        return View('administracion.reportes.reprobados',compact('eventos'));
    }

    public function getInscritos(){
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        //$eventos = Evento::where('estado',1)->where('fecha_fin', '<', $date)->get();
        $eventos = Evento::where('estado',1)->get();
        return View('administracion.reportes.inscritos',compact('eventos'));
    }


    function restarHoras($horaini,$horafin)
    {
        $horai=substr($horaini,0,2);
        $mini=substr($horaini,3,2);
        $segi=substr($horaini,6,2);

        $horaf=substr($horafin,0,2);
        $minf=substr($horafin,3,2);
        $segf=substr($horafin,6,2);

        $ini=((($horai*60)*60)+($mini*60)+$segi);
        $fin=((($horaf*60)*60)+($minf*60)+$segf);

        $dif=$fin-$ini;

        $difh=floor($dif/3600);
        $difm=floor(($dif-($difh*3600))/60);
        $difs=$dif-($difm*60)-($difh*3600);
        return date("H-i-s",mktime($difh,$difm,$difs));
    }

    public function postAprobados(Request $request){
        $suma ='0-0';
        $cont=0;
        $array_inscripciones = array();
        $array_inscripciones_aprobadas = array();
        $array_horas_inscripcion = array();

        $this->validate($request, [
            'evento_id'=>'required',
        ]);
        $evento = Evento::find($request->input('evento_id'));
        $total_evento=0;
        foreach($evento->temarios as $temario){
            $total_evento = $total_evento+$temario->duracion;
       }
       $total_evento_porciento = $total_evento*.7;

        foreach($evento->usuarios as $usuarios){
            //echo $usuarios->id.'<br>';
            foreach ($usuarios->inscripcion as $inscripcion){
                if($inscripcion->evento->id == $evento->id){
                    if ($inscripcion->validado ==1 and $inscripcion->estado ==1 )
                        $array_inscripciones[]= $inscripcion;
                }
            }
        }

        foreach ($array_inscripciones as $inscripciones){
            foreach ($inscripciones->asistencias as $asistencia){
                if ($asistencia->hora_primera_final != null){
                    $primera =  $this->restarHoras($asistencia->hora_primera_inicial, $asistencia->hora_primera_final);
                }
                else{
                    $primera = '0-0';
                }
                if ($asistencia->hora_segunda_final != null){
                    $segunda = $this->restarHoras($asistencia->hora_segunda_inicial, $asistencia->hora_segunda_final);
                }
                else{
                    $segunda = '0-0';
                }

                $cont++;
                $temp =$this->CalcularHoraSalida($primera,$segunda);
                $suma = $this->CalcularHoraSalida($suma,$temp);
            }
            $suma = str_replace("-", ".", $suma);
            if ($suma >= $total_evento_porciento){
                $array_inscripciones_aprobadas[]=$inscripciones;
                $array_horas_inscripcion[]=$suma;
            }
            $suma ='0-0';
            $cont=0;
            /*Para saber si no asistio al evento, sera reprobado tambien
             * if ($cont==0){
                echo 'No asistio'.$inscripcion->id.'<br>';
            }
             */
        }
        $pdf = PDF::loadView('administracion.pdf.aprobados',['inscripciones'=>$array_inscripciones_aprobadas,'horas'=>$array_horas_inscripcion,'evento'=>$evento,'total_horas_evento'=>$total_evento]);
        return $pdf->download('aprobados.pdf');

    }

    public function postReprobados(Request $request){
        $suma ='0-0';
        $cont=0;
        $array_inscripciones = array();
        $array_inscripciones_reprobadas = array();
        $array_horas_inscripcion = array();

        $this->validate($request, [
            'evento_id'=>'required',
        ]);
        $evento = Evento::find($request->input('evento_id'));
        $total_evento=0;
        foreach($evento->temarios as $temario){
            $total_evento = $total_evento+$temario->duracion;
        }
        $total_evento_porciento = $total_evento*.7;

        foreach($evento->usuarios as $usuarios){
            //echo $usuarios->id.'<br>';
            foreach ($usuarios->inscripcion as $inscripcion){
                if($inscripcion->evento->id == $evento->id){
                    if ($inscripcion->validado ==1 and $inscripcion->estado ==1 )
                        $array_inscripciones[]= $inscripcion;
                }
            }
        }

        foreach ($array_inscripciones as $inscripciones){
            foreach ($inscripciones->asistencias as $asistencia){
                if ($asistencia->hora_primera_final != null){
                    $primera =  $this->restarHoras($asistencia->hora_primera_inicial, $asistencia->hora_primera_final);

                }
                else{
                    $primera = '0-0';
                }
                if ($asistencia->hora_segunda_final != null){
                    $segunda = $this->restarHoras($asistencia->hora_segunda_inicial, $asistencia->hora_segunda_final);
                }
                else{
                    $segunda = '0-0';
                }

                $cont++;
                $temp =$this->CalcularHoraSalida($primera,$segunda);
                $suma = $this->CalcularHoraSalida($suma,$temp);
            }
            $suma = str_replace("-", ".", $suma);
            if ($cont==0){//pago pero no fue a clases
                $array_inscripciones_reprobadas[]=$inscripciones;
            }
            if ($suma < $total_evento_porciento){
                $array_inscripciones_reprobadas[]=$inscripciones;
                $array_horas_inscripcion[]=$suma;
            }
            $suma ='0-0';
            $cont=0;

        }
        $pdf = PDF::loadView('administracion.pdf.reprobados',['inscripciones'=>$array_inscripciones_reprobadas,'horas'=>$array_horas_inscripcion,'evento'=>$evento,'total_horas_evento'=>$total_evento]);
        return $pdf->download('reprobados.pdf');

    }

    public function postInscritos(Request $request){
        $array_inscripciones = array();
        $this->validate($request, [
            'evento_id'=>'required',
        ]);
        $evento = Evento::find($request->input('evento_id'));
        $total_evento=0;
        foreach($evento->temarios as $temario){
            $total_evento = $total_evento+$temario->duracion;
        }
        foreach($evento->usuarios as $usuarios){
            //echo $usuarios->id.'<br>';
            foreach ($usuarios->inscripcion as $inscripcion){
                if($inscripcion->evento->id == $evento->id){
                    if ($inscripcion->validado ==1 and $inscripcion->estado ==1 )
                        $array_inscripciones[]= $inscripcion;
                }
            }
        }

        $pdf = PDF::loadView('administracion.pdf.inscritos',['inscripciones'=>$array_inscripciones,'evento'=>$evento]);
        return $pdf->download('inscritos.pdf');

    }

    function CalcularHoraSalida($hora_ingreso, $jornal) {
        $hora_ingreso=explode("-",$hora_ingreso);
        $jornal=explode("-",$jornal);
        $horas=(int)$hora_ingreso[0]+(int)$jornal[0];
        $minutos=(int)$hora_ingreso[1]+(int)$jornal[1];
        $horas+=(int)($minutos/60);
        $minutos=$minutos%60;
        if($minutos<10)$minutos="0".$minutos ;
        return $hora_salida = $horas."-".$minutos;;
    }


}
