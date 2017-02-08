<?php

namespace Congreso\Http\Controllers;

use Illuminate\Http\Request;
use Congreso\Evento;

class CursosController extends Controller
{
    public function todos_cursos()
    {
        return view('todos_cursos');
    }

   


    public function cursos($id){
        
        $eventos = Evento::find($id);
        return view('cursos',compact('eventos'));
     
    }
}
