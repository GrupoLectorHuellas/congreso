<?php

namespace Congreso\Http\Controllers;

use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function todos_cursos()
    {
        return view('todos_cursos');
    }

    public function cursos()
    {
        return view('cursos');
    }
}
