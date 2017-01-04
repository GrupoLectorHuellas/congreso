<?php

namespace Congreso\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Congreso\Expositor;

class ExpositorController extends Controller
{

    public function index(Request $request){
        $expositores = Expositor::where('estado',1)->orderBy('id')->paginate(6);
        if ($request->ajax()) {
            $expositores = Expositor::all();
            return response()->json($expositores);
        }
        return View('administracion.expositores.index',compact('expositores'));

    }
    public function create(){
        return View('administracion.expositores.create');
    }

    public function store(Request $request){

            Expositor::create($request->all());

                return Redirect::to('administracion/expositores/create')->with('mensaje-registro', 'Expositor Registrado Correctamente');


    }

    public function edit($id){
        $expositor = Expositor::find($id);
        return view('administracion.expositores.edit',compact('expositor'));


    }

    public function update(Request $request, $id){
        $expositor = Expositor::find($id);
        $expositor->fill($request->all());

        if($expositor->save()){
            return Redirect::to('administracion/expositores')->with('mensaje-registro', 'Expositor Actualizado Correctamente');
        }



    }

    public function destroy($id, Request $request)
    {
        $expositor = Expositor::find($id);
        $expositor->estado = 0;
        $expositor->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $expositor->id,
                'message' => $message
            ]);
        }
    }
}
