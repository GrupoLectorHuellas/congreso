<?php

namespace Congreso\Http\Controllers;

use Illuminate\Http\Request;
use Congreso\Redes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Congreso\Http\Requests\RedesRequest;

class RedesController extends Controller
{
     public function edit($id){
        $redes = Redes::find($id);
        return view('administracion.redes.edit',compact('redes'));


    }

    public function index(Request $request){
        $redes= Redes::where('estado',1)->paginate(3);
        
        return view('administracion.redes.index',compact('redes'));

    }

     public function update(RedesRequest $request, $id){
        $redes = Redes::find($id);
        $redes->fill($request->all());

        if($redes->save()){
            return Redirect::to('administracion/redes')->with('mensaje-registro', 'Red social Actualizado Correctamente');
        }



    }
}
