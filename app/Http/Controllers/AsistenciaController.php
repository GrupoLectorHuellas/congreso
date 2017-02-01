<?php

namespace Congreso\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Congreso\Inscripcion;
use Congreso\Asistencia;
use Congreso\Usuario;
use Congreso\Http\Requests\AsistenciaRequest;
use Carbon\Carbon;


class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencias= Asistencia::where('estado',1)->paginate(5);
        return View('administracion.asistencias.index',compact('asistencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        $usuarios= Usuario::where('estado',1)->get();
        $inscripciones = Inscripcion::where('estado',1)->get();
        return View('administracion.asistencias.create',compact('inscripciones','date','usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsistenciaRequest $request)
    {   $id_inscripcion="";
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        $inscripcion = Inscripcion::where('usuario_id', $request->input('usuario_id'))
            ->where('evento_id',$request->input('evento_id'))->get();
        foreach ($inscripcion as $inscripcion) {
            $id_inscripcion=$inscripcion->id;
        }

        Asistencia::create([
            'fecha'=>$date,
            'hora_primera_inicial'=>$request->input('hora_primera_inicial'),
            'hora_primera_final'=>$request->input('hora_segunda_final'),
            'hora_segunda_inicial'=>$request->input('hora_segunda_inicial'),
            'hora_segunda_final'=>$request->input('hora_segunda_final'),
            'id_inscripciones'=>$id_inscripcion,
            'estado'=>1,
        ]);
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
    public function update(Request $request, $id)
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
