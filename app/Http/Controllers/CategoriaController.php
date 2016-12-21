<?php

namespace Congreso\Http\Controllers;

use Congreso\Http\Requests\CategoriaFormRequest;
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
        if ($request){
            $query = trim($request->get('searchText'));
            $categorias = DB::table('categorias')
                ->where('nombre','LIKE',$query)
                ->where('estado', '=','1')
                ->orderBy('nombre','desc')
                ->paginate(10);
            return view('administration.categorias.index',compact('categorias','query'));
        }

    }
    public function create(){
        return view ('administration.categorias.create');

    }
    public function store(CategoriaFormRequest $request){
        $categoria= new Categoria();
        $categoria->nombre=$request->get('nombre');
        $categoria->nombre=$request->get('descripcion');
        $categoria->estado ='1';
        $categorias->save();
        return Redirect::to('administration/categorias');


    }
    public function show ($id){
        $categoria = Categoria::findOrFail($id);
        return view('administration.categorias.show',compact('categoria'));

    }
    public function edit($id){
        $categoria = Categoria::findOrFail($id);
        return view('administration.categorias.edit',compact('categoria'));

    }
    public function update(CategoriaFormRequest $request, $id){
        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->get('nombre');
        $categoria->nombre = $request->get('descripcion');
        $categoria->update();
        return Redirect::to('administration/categorias');



    }
    public function destroy($id){
        $categoria = Categoria::findOrFail($id);
        $categoria->estado ='0';
        $categoria->update();
        return Redirect::to('administration/categorias');

    }
}
