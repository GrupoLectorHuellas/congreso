<?php

namespace Congreso\Providers;

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
            $fecha_inicio= $parameters[0];
            if ($fecha_inicio ==114){
                return true;

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
