<?php

namespace Congreso\Http\Controllers;

use Congreso\EventoExpositor;
use Congreso\Http\Requests\EventoRequest;
use Congreso\Http\Requests\EventoEditRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Congreso\Evento;
use Congreso\Categoria;
use Congreso\Expositor;


class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::where('estado',1)->orderBy('id')->paginate(6);
        return View('administracion.eventos.index',compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::where('estado',1)->get();
        $expositores = Expositor::where('estado',1)->get();
        return View('administracion.eventos.create',compact('categorias','expositores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventoRequest $request)
    {
        $evento =Evento::create($request->all());

        $total_expositores = $request->expositores;
        foreach($total_expositores as $expositor){
            EventoExpositor::create([
                'evento_id'=>$evento->id,
                'expositor_id'=>$expositor,
            ]);
        }
        return Redirect::to('administracion/eventos/create')->with('mensaje-registro', 'Evento Registrado Correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $evento = Evento::find($id);
        $expositores = Expositor::where('estado',1)->get();
        $categorias = Categoria::where('estado',1)->get();
        return view('administracion.eventos.edit',compact('evento','categorias','expositores'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventoEditRequest $request, $id)
    {
        $evento = Evento::find($id);
        $evento->fill($request->all());

        $evento->expositores()->sync($request->get('expositores'));
        if($evento->save()){
            return Redirect::to('administracion/eventos')->with('mensaje-registro', 'Evento Actualizado Correctamente');
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $evento = Evento::find($id);
        $evento->estado = 0;
        $evento->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $evento->id,
                'message' => $message
            ]);
        }
    }
}
