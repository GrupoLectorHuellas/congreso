<?php

namespace Congreso\Http\Controllers;
use Illuminate\Http\Request;
use Congreso\Usuario;
use Congreso\Facultad;
use Congreso\Carrera;
use Congreso\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class UsuarioController extends Controller
{

    public function __construct()
    {
    }
    public function index(Request $request){

        $usuarios= Usuario::where('estado',1)->paginate(1);
        if($request->ajax()){
            return response()->json(view('administracion.usuarios.ajax-usuarios',compact('usuarios'))->render());
        }

        return view('administracion.usuarios.index',compact('usuarios'));



    }


    public function getRegister(){
        $facultades = Facultad::all();
        $carreras = Carrera::pluck('nombre','id');

        return view("administracion.usuarios.nuevo_usuario",compact('facultades','carreras'));
    }
}
