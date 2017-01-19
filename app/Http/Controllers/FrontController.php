<?php

namespace Congreso\Http\Controllers;

use Congreso\Usuario;
use Illuminate\Http\Request;
use Congreso\Video;

class FrontController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['only'=>'admin']);
    }


    public function index(){
        $video= Video::all()->first();
        return view('welcome', compact('video'));
    }

    public function editarPerfil(){
        return view('editar_perfil');
    }

    public function MiPerfil(){
        return view('mi_perfil');
    }

    public function admin(){
        $total_usuarios = Usuario::where('estado',1)->count();
        return view('administracion.index',compact('total_usuarios'));
    }
}
