<?php

namespace Congreso\Http\Controllers;

use Congreso\Http\Requests\EventoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Congreso\Evento;
use Congreso\Temario;

class TemarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temarios = Temario::where('estado',1)->orderBy('id')->paginate(6);
        return View('administracion.temarios.index',compact('temarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventos = Evento::where('estado',1)->get();
        return View('administracion.temarios.create',compact('eventos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Temario::create($request->all());
        return Redirect::to('administracion/temarios/create')->with('mensaje-registro', 'Temario Registrado Correctamente');
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
        $temario = Temario::find($id);
        $eventos = Evento::where('estado',1)->get();
        return view('administracion.temarios.edit',compact('temario','eventos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $temario = Temario::find($id);
        $temario->fill($request->all());

        if($temario->save()){
            return Redirect::to('administracion/temarios')->with('mensaje-registro', 'Temario Actualizado Correctamente');
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
        $temario = Temario::find($id);
        $temario->estado = 0;
        $temario->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $temario->id,
                'message' => $message
            ]);
        }
    }
}
