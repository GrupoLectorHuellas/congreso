<?php

namespace Congreso\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Congreso\Firma;
use Congreso\Evento;
use Congreso\EventoFirmas;
use Congreso\Http\Requests\FirmasRequest;
use Congreso\Http\Requests\FirmasEditRequest;



class FirmaController extends Controller
{
     public function index(Request $request){

       
        $firmas = Firma::where('estado',1)->orderBy('id')->paginate(6);
        
        return View('administracion.firmas.index',compact('firmas'));

    }
    public function create(){
        
        $eventos = Evento::where('estado',1)->get();
        return View('administracion.firmas.create',compact('eventos'));
        
    }

    public function store(FirmasRequest $request){

            $firma =Firma::create($request->all());

            $total_eventos = $request->eventos;
            foreach($total_eventos as $evento){
                EventoFirmas::create([
                    'evento_id'=>$evento,
                    'firma_id'=>$firma->id,
                    
                ]);
            }

            return Redirect::to('administracion/firmas/create')->with('mensaje-registro', 'Firma Registrada Correctamente');


    }

    public function edit($id){
        $firma = Firma::find($id);
        $eventos = Evento::where('estado',1)->get();
       
        return view('administracion.firmas.edit',compact('firma','eventos'));
       


    }

    public function update(FirmasEditRequest $request, $id){
        $firma = Firma::find($id);
        $firma->fill($request->all());

        $firma->eventos()->sync($request->get('eventos'));

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
