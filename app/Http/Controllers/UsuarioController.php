<?php

namespace Congreso\Http\Controllers;

use Illuminate\Http\Request;
use Congreso\Usuario;
use Congreso\Facultad;
use Congreso\Carrera;

class UsuarioController extends Controller
{
    public function getRegister(){
        $facultades = Facultad::all();
        $carreras = Carrera::pluck('nombre','id');

        return view("administracion.usuarios.nuevo_usuario",compact('facultades','carreras'));
    }
}
