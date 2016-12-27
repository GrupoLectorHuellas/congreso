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
            return $validador->validarCedula($value);
            #si devuelve true no imprime mensaje


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
