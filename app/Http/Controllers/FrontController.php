<?php

namespace Congreso\Http\Controllers;

use Congreso\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Congreso\Video;
use Congreso\Evento;

class FrontController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['only'=>'admin']);
    }


    public function index(){
        $video= Video::all()->first();
        $eventos= Evento::where('estado',1)->paginate(3);
        return view('welcome', compact('video', 'eventos'));
    }

    

    public function editarPerfil(){
        return view('editar_perfil');
    }

    public function recuperar_pass(){
        return view('recuperar_pass');
    }

    public function MiPerfil(){
        return view('mi_perfil');
    }

    public function admin(){
        $total_usuarios = Usuario::where('estado',1)->count();
        return view('administracion.index',compact('total_usuarios'));
    }
}
