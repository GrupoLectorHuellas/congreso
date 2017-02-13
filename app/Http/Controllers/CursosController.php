<?php

namespace Congreso\Http\Controllers;

use Illuminate\Http\Request;
use Congreso\Evento;
use Congreso\Temario;
use Congreso\Contenido;
use Congreso\Expositor;

class CursosController extends Controller
{
    public function todos_cursos()
    {
        return view('todos_cursos');
    }

   


    public function cursos($id){
        
        $eventos = Evento::find($id);
        $temarios = Temario::where('id_temario',$eventos->id)->get();
        $expositores = Expositor::where('estado',1)->get();
        $contenidos = Contenido::where('estado',1)->get();
        return view('cursos',compact('eventos', 'temarios', 'expositores', 'contenidos'));
     
    }
}
