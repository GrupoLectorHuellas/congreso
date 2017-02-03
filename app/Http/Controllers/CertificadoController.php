<?php

namespace Congreso\Http\Controllers;

use Congreso\Certificado;
use Congreso\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class CertificadoController extends Controller
{
    public function getGenerar(){
        $eventos = Evento::where('estado',1)->get();
        return View('administracion.certificados.create',compact('eventos'));
    }

    public function getListado(){
        $certificados = Certificado::all();
        return View('administracion.certificados.listado',compact('certificados'));
    }

    public function postGenerar(Request $request){
        $repetido=0;
        $certificado =0;
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
                $certificado=$certificado+1;
                foreach ($inscripciones->certificados as $certific){
                    $repetido = $repetido+1;
                }
                if ($repetido ==0){
                    Certificado::create([
                        'id_inscripciones'=>$inscripciones->id,

                    ]);
                    //enviar correo
                    Mail::to($inscripciones->usuario->email,$inscripciones->usuario->nombre)
                        ->send(new \Congreso\Mail\Certificado($inscripciones));

                }

            }
            $suma ='0-0';
            $cont=0;
            $repetido =0;

        }
        if ($certificado==0){
            return Redirect::to('administracion/certificados/listado')->with('mensaje-registro', 'No se necesita generar certificados');


        }
        else{
            return Redirect::to('administracion/certificados/listado')->with('mensaje-registro', 'Certificados generado correctamente');

        }


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
}
