<?php

namespace Congreso\Http\Controllers;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Congreso\Usuario;
use Congreso\Facultad;
use Congreso\Carrera;
use Congreso\Categoria;
use Congreso\Librerias\ValidarIdentificacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    public function __construct()
    {
    }
    public function index(Request $request){
        $usuarios= Usuario::where('estado',1)->paginate(5);
        if($request->ajax()){
            return response()->json(view('administracion.usuarios.ajax-usuarios',compact('usuarios'))->render());
        }
        return view('administracion.usuarios.index',compact('usuarios'));
    }

    public function create(){
        $facultades = Facultad::all();
        return view("administracion.usuarios.nuevo_usuario",compact('facultades'));

    }

    public function store(Request $request){
        $data = $request;
        if ($data['ocupacion']=="Estudiante"){
            $this->validate($request,[
                'id'=>['required','unique:usuarios,id','validar_cedula'],
                'nombres'=>['required'],
                'apellidos'=>['required'],
                'ciudad'=>['required'],
                'telefono'=>['required'],
                'facultad'=>['required'],
                'carrera'=>['required'],
                'email'=>['required','unique:usuarios'],
                'password'=>['required'],
            ]);
            $user=new Usuario;
            $user->id=$data['id'];
            $user->nombres=$data['nombres'];
            $user->apellidos=$data['apellidos'];
            $user->ciudad=$data['ciudad'];
            $user->telefono=$data['telefono'];
            $user->id_carreras=$data['carrera'];
            $user->email=$data['email'];
            $user->password=bcrypt($data['password']);
            $user->estado=1;
        }
        elseif ($data['ocupacion']=="Profesional") {
            $this->validate($request,[
                'id'=>['required','unique:usuarios,id','validar_cedula'],
                'nombres'=>['required'],
                'apellidos'=>['required'],
                'ciudad'=>['required'],
                'telefono'=>['required'],
                'titulo'=>['required'],
                'email'=>['required','unique:usuarios'],
                'password'=>['required'],
            ]);
            $user=new Usuario;
            $user->id=$data['id'];
            $user->nombres=$data['nombres'];
            $user->apellidos=$data['apellidos'];
            $user->ciudad=$data['ciudad'];
            $user->telefono=$data['telefono'];
            $user->titulo=$data['titulo'];
            $user->email=$data['email'];
            $user->password=bcrypt($data['password']);
            $user->estado=1;

        }
        else{
            $this->validate($request,[
                'id'=>['required','unique:usuarios,id','validar_cedula'],
                'nombres'=>['required'],
                'apellidos'=>['required'],
                'ciudad'=>['required'],
                'telefono'=>['required'],
                'email'=>['required','unique:usuarios'],
                'password'=>['required'],
            ]);
        }
        if($user->save()){
            return Redirect::to('administracion/usuarios/create')->with('mensaje-registro', 'Usuario Registrado Correctamente');
        }
    }

    public function edit($id){
        $facultades = Facultad::all();
        $usuario= Usuario::find($id);
        return View('administracion.usuarios.edit',compact('usuario','facultades'));
    }

    public function update($id,Request $request){
        $data = $request;
        $user= Usuario::find($id);
        if ($data['ocupacion']=="Estudiante"){
            $this->validate($request,[
                'id'=>['required','validar_cedula',Rule::unique('usuarios')->ignore($user->id,'id'),],
                'nombres'=>['required'],
                'apellidos'=>['required'],
                'ciudad'=>['required'],
                'telefono'=>['required'],
                'facultad'=>['required'],
                'carrera'=>['required'],
                'email'=>['required',Rule::unique('usuarios')->ignore($user->id),],
            ]);
            $user->id=$data['id'];
            $user->nombres=$data['nombres'];
            $user->apellidos=$data['apellidos'];
            $user->ciudad=$data['ciudad'];
            $user->telefono=$data['telefono'];
            $user->id_carreras=$data['carrera'];
            $user->titulo="";
            $user->email=$data['email'];
            $user->estado=1;
        }
        elseif ($data['ocupacion']=="Profesional") {
            $this->validate($request,[
                'id'=>['required','validar_cedula',Rule::unique('usuarios')->ignore($user->id),],
                'nombres'=>['required'],
                'apellidos'=>['required'],
                'ciudad'=>['required'],
                'telefono'=>['required'],
                'titulo'=>['required'],
                'email'=>['required',Rule::unique('usuarios')->ignore($user->id),],
            ]);
            $user->id=$data['id'];
            $user->nombres=$data['nombres'];
            $user->apellidos=$data['apellidos'];
            $user->ciudad=$data['ciudad'];
            $user->telefono=$data['telefono'];
            $user->id_carreras=null;
            $user->titulo=$data['titulo'];
            $user->email=$data['email'];
            $user->password=$data['password'];
            $user->estado=1;
        }
        if($user->save()){
            return Redirect::to('administracion/usuarios')->with('mensaje-registro', 'Usuario Actualizado Correctamente');
        }

    }




}
