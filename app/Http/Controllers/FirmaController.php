<?php

namespace Congreso\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Congreso\Firma;
use Congreso\Http\Requests\FirmasRequest;
use Congreso\Http\Requests\FirmasEditRequest;


class FirmaController extends Controller
{
     public function index(Request $request){
        $firmas = Firma::where('estado',1)->orderBy('id')->paginate(6);
        if ($request->ajax()) {
            $firmas = Firma::all();
            return response()->json($firmas);
        }
        return View('administracion.firmas.index',compact('firmas'));

    }
    public function create(){
        return View('administracion.firmas.create');
    }

    public function store(FirmasRequest $request){

            Firma::create($request->all());

                return Redirect::to('administracion/firmas/create')->with('mensaje-registro', 'Firma Registrada Correctamente');


    }

    public function edit($id){
        $firma = Firma::find($id);
        return view('administracion.firmas.edit',compact('firma'));


    }

    public function update(FirmasEditRequest $request, $id){
        $firma = Firma::find($id);
        $firma->fill($request->all());

        if($firma->save()){
            return Redirect::to('administracion/firmas')->with('mensaje-registro', 'Firma Actualizada Correctamente');
        }



    }

    public function destroy($id, Request $request)
    {
        $firma = Firma::find($id);
        $firma->estado = 0;
        $firma->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $firma->id,
                'message' => $message
            ]);
        }
    }

}
