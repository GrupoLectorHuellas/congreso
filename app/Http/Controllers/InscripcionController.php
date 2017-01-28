<?php

namespace Congreso\Http\Controllers;

use Carbon\Carbon;
use Congreso\Evento;
use Congreso\Http\Requests\InscripcionRequest;
use Congreso\Inscripcion;
use Congreso\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Include_;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscripciones = Inscripcion::where('estado',1)->orderBy('id')->paginate(6);
        return View('administracion.inscripciones.index',compact('inscripciones'));
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
        $eventos = Evento::where('estado',1)->get();
        return View('administracion.inscripciones.create',compact('eventos','usuarios','date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InscripcionRequest $request)
    {
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        Inscripcion::create([
            'fecha'=>$date,
            'usuario_id'=>$request->input('usuario_id'),
            'evento_id'=>$request->input('evento_id'),
        ]);
       return Redirect::to('administracion/inscripciones/create')->with('mensaje-registro', 'Inscripción Registrada Correctamente');
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
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        $eventos = Evento::where('estado',1)->get();
        $inscripcion = Inscripcion::find($id);
        return view('administracion.inscripciones.edit',compact('eventos','inscripcion','date'));
    }

    public function getValidar(){
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        $usuarios= Usuario::where('estado',1)->get();
        $eventos = Evento::where('estado',1)->get();
        return View('administracion.inscripciones.validar',compact('eventos','usuarios','date'));

    }

    public function postValidar(InscripcionRequest $request){
        $inscripcion = Inscripcion::where('usuario_id',$request->input('usuario_id'))
                                    ->where('evento_id',$request->input('evento_id'))->get();
        //siempre 1 registro convertir por foreach
        foreach ($inscripcion as $inscripcion){
            $inscripcion->validado=1;
            $inscripcion->save();
        }
        return Redirect::to('administracion/validar-inscripcion')->with('mensaje-registro', 'Inscripción Validada Correctamente');



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
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        $data = $request;
        $inscripcion = Inscripcion::find($id);
        $inscripcion->fecha =$date;
        $inscripcion->usuario_id =$data['usuario_id'];
        $inscripcion->evento_id =$data['evento_id'];

        if (!isset( $data['validar'] )) {
            $inscripcion->validado=0;
        }else{
            $inscripcion->validado=1;
        }

        if($inscripcion->save()){
            return Redirect::to('administracion/inscripciones')->with('mensaje-registro', 'Inscripción Actualizada Correctamente');
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
        $inscripcion = Inscripcion::find($id);
        $inscripcion->estado = 0;
        $inscripcion->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $inscripcion->id,
                'message' => $message
            ]);
        }
    }

    public function getEventosNoMatriculados(Request $request,$id){
        if ($request->ajax()){
            $eventos = Evento::eventosNoMatriculados($id);
            return response()->json($eventos);

        }
    }

    public function getEventosMatriculados(Request $request,$id){
        if ($request->ajax()){
            $eventos = Evento::eventosMatriculados($id);
            return response()->json($eventos);

        }
    }
}
