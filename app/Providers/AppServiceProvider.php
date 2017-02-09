<?php

namespace Congreso\Providers;

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
