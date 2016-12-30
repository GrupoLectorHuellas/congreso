<?php

namespace Congreso\Http\Controllers;

use Congreso\Http\Requests\CategoriaRequest;
use Illuminate\Http\Request;
use Congreso\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request){
        $categorias= Categoria::where('estado',1)->paginate(2);
        if($request->ajax()){
            return response()->json(view('administracion.categorias.ajax-categorias',compact('categorias'))->render());
        }
        return view('administracion.categorias.index',compact('categorias'));

    }
    public function create(){
        return view ('administracion.categorias.create');
    }
    public function store(CategoriaRequest $request){
        $categoria= new Categoria;
        $categoria->nombre=$request['nombre'];
        $categoria->descripcion=$request['descripcion'];
        $categoria->estado ='1';
        $categoria->save();
        if($categoria->save()){
            return Redirect::to('administracion/categorias/create')->with('mensaje-registro', 'Categoria Registrada Correctamente');
        }
    }
    public function show ($id){
        $categoria = Categoria::findOrFail($id);
        return view('administration.categorias.show',compact('categoria'));

    }
    public function edit($id){
        $categoria = Categoria::find($id);
        return view('administracion.categorias.edit',compact('categoria'));


    }
    public function update(CategoriaRequest $request, $id){
        $categoria = Categoria::find($id);
        $categoria->fill($request->all());

        if($categoria->save()){
            return Redirect::to('administracion/categorias')->with('mensaje-registro', 'Categoria Actualizada Correctamente');
        }



    }
    public function destroy($id, Request $request)
    {
        $categoria = Categoria::find($id);
        $categoria->estado = 0;
        $categoria->save();

        $message = "Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $categoria->id,
                'message' => $message
            ]);
        }
    }
}
