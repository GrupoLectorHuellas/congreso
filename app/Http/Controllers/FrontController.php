<?php

namespace Congreso\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['only'=>'admin']);
    }


    public function index(){
        return view('welcome');
    }

    public function editarPerfil(){
        return view('editar_perfil');
    }

    public function admin(){
        return view('administracion.index');
    }
}
