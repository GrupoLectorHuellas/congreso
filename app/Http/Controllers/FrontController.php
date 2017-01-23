<?php

namespace Congreso\Http\Controllers;

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

    public function recuperar_pass(){
        return view('recuperar_pass');
    }

    public function MiPerfil(){
        return view('mi_perfil');
    }

    public function admin(){
        return view('administracion.index');
    }
}
