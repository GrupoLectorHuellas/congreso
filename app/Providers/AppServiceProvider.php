<?php

namespace Congreso\Providers;

use Congreso\Evento;
use Congreso\Inscripcion;
use Congreso\Temario;
use Illuminate\Support\ServiceProvider;
use Validator;
use Congreso\Librerias\ValidarIdentificacion;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Validator::extend('validar_cedula', function($attribute, $value, $parameters, $validator) {
            $validador = new ValidarIdentificacion();
            if ($validador->validarCedula($value) && $value != '2222222222')
                return true;
            #si devuelve true no imprime mensaje


        });

        Validator::extend('validar_fecha_inicio', function($attribute, $value, $parameters, $validator) {
            if ($parameters[0]== null) {
                return true;
                //para que cuando sea null no ternorne ningun mensaje ni haga busquedas con null
            }else {
            $id_temario= $parameters[0];
            $temario = Temario::find($id_temario);
            //
            if ( $temario->eventos->fecha_inicio <= $value and $temario->eventos->fecha_fin >= $value){
                return true;

            }
            }

        });

        Validator::extend('validar_fecha_fin', function($attribute, $value, $parameters, $validator) {
            if ($parameters[0]== null) {
                return true;
            }else {
                $id_temario = $parameters[0];
                $temario = Temario::find($id_temario);
                //
                if ($temario->eventos->fecha_inicio <= $value and $temario->eventos->fecha_fin >= $value) {
                    return true;
                }
            }
        });
        Validator::extend('validar_fecha_asistencia', function($attribute, $value, $parameters, $validator) {
            if ($parameters[0]== null) {
                return true;
            }else {
                $id_evento = $parameters[0];
                $evento = Evento::find($id_evento);
                //
                if ($evento->fecha_inicio <= $value and $evento->fecha_fin >= $value) {
                    return true;
                }
            }
        });

        Validator::extend('validar_fecha_asistencia_repetida', function($attribute, $value, $parameters, $validator) {
            $array = array();

            if ($parameters[0]== null or $parameters[1]== null ) {
                return true;
            }else {
                $id_evento = $parameters[0];
                $id_usuario= $parameters[1];
                $inscripciones = Inscripcion::where('evento_id',$id_evento)->where('usuario_id',$id_usuario)->get();
                //
                    foreach ($inscripciones as $inscripcion){
                        foreach ($inscripcion->asistencias as $asistencia){
                            $array []= $asistencia->fecha;
                        }
                    }

                    if(!in_array($value,$array)){
                        return true;
                    }

            }
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
