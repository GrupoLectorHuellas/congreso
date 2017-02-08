<?php

namespace Congreso\Http\Controllers;

use Illuminate\Http\Request;
use Congreso\Imagen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Congreso\Http\Requests\ImagenCertificadoRequest;

class ImagenCertificadoController extends Controller
{
      public function edit($id){
        $certificado = Imagen::find($id);
        return view('administracion.imagen_certificado.edit',compact('certificado'));


    }

    public function index(Request $request){
        $certificados= Imagen::where('id',1)->paginate(1);
         return View('administracion.imagen_certificado.index',compact('certificados'));

    }

     public function update(Request $request, $id){
        $certificado = Imagen::find($id);
        $certificado->fill($request->all());

        if($certificado->save()){
            return Redirect::to('administracion/imagenes')->with('mensaje-registro', 'Modelo de Certificado Actualizado Correctamente');
        }



    }
}
