<?php

namespace Congreso\Http\Controllers;

use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function mi_perfil()
    {
        return view('mi_perfil');
    }

    public function editar_perfil()
    {
        return view('editar_perfil');
    }
}
