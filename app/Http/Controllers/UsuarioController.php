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
        $carreras = Carrera::pluck('nombre','id');
        return view("administracion.usuarios.nuevo_usuario",compact('facultades','carreras'));

    }

    public function store(Request $request){


        $data = $request;
        if ($data['ocupacion']=="Estudiante"){
            $this->validate($request,[
                'cedula'=>['required','unique:usuarios,id','validar_cedula'],
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
            $user->id=$data['cedula'];
            $user->nombres=$data['nombres'];
            $user->apellidos=$data['apellidos'];
            $user->ciudad=$data['ciudad'];
            $user->telefono=$data['telefono'];
            $user->id_facultades=$data['facultad'];
            $user->email=$data['email'];
            $user->password=bcrypt($data['password']);
            $user->estado=1;
        }
        elseif ($data['ocupacion']=="Profesional") {
            $this->validate($request,[
                'cedula'=>['required','unique:usuarios,id','validar_cedula'],
                'nombres'=>['required'],
                'apellidos'=>['required'],
                'ciudad'=>['required'],
                'telefono'=>['required'],
                'titulo'=>['required'],
                'email'=>['required','unique:usuarios'],
                'password'=>['required'],
            ]);
            $user=new Usuario;
            $user->id=$data['cedula'];
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
                'cedula'=>['required','unique:usuarios,id','validar_cedula'],
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
        $usuario= Usuario::find($id);
        return View('administracion.usuarios.edit',compact('usuario'));


    }


}
