<?php

namespace Congreso\Http\Controllers;

use Congreso\Http\Requests\EventoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Congreso\Contenido;
use Congreso\Temario;

class ContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contenidos = Contenido::where('estado',1)->orderBy('id')->paginate(6);
        return View('administracion.contenidos.index',compact('contenidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $temarios = Temario::where('estado',1)->get();
        return View('administracion.contenidos.create',compact('temarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Contenido::create($request->all());
        return Redirect::to('administracion/contenidos/create')->with('mensaje-registro', 'Contenido Registrado Correctamente');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contenido = Contenido::find($id);
        $temarios = Temario::where('estado',1)->get();
        return view('administracion.contenidos.edit',compact('contenido','temarios'));

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
        $contenido = Contenido::find($id);
        $contenido->fill($request->all());

        if($contenido->save()){
            return Redirect::to('administracion/contenidos')->with('mensaje-registro', 'Contenido Actualizado Correctamente');
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
        $contenido = Contenido::find($id);
        $contenido->estado = 0;
        $contenido->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $contenido->id,
                'message' => $message
            ]);
        }
    }
}
