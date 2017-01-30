<?php

namespace Congreso\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Congreso\Inscripcion;
use Congreso\Asistencia;
use Congreso\Http\Requests\AsistenciaRequest;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencias = Asistencia::where('estado',1)->orderBy('id')->paginate(6);
        return View('administracion.asistencias.index',compact('asistencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inscripciones = Inscripcion::where('estado',1)->get();
        return View('administracion.asistencias.create',compact('inscripciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsistenciaRequest $request)
    {
        Asistencia::create($request->all());
        return Redirect::to('administracion/asistencias/create')->with('mensaje-registro', 'Asistencia Registrada Correctamente');
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
        $asistencia = Asistencia::find($id);
        $inscripciones = Inscripcion::where('estado',1)->get();
        return view('administracion.asistencias.edit',compact('asistencia','inscripciones'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AsistenciaRequest $request, $id)
    {
        $asistencia = Asistencia::find($id);
        $asistencia->fill($request->all());

        if($asistencia->save()){
            return Redirect::to('administracion/asistencias')->with('mensaje-registro', 'Asistencia Actualizada Correctamente');
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
        $asistencia = Asistencia::find($id);
        $asistencia->estado = 0;
        $asistencia->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $asistencia->id,
                'message' => $message
            ]);
        }
    }
}
