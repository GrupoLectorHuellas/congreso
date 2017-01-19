<?php

namespace Congreso\Http\Controllers;
use Congreso\Provincia;
use Congreso\Rol;
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
        $this->middleware('auth');
    }
    public function index(Request $request){
        $usuarios= Usuario::where('estado',1)->paginate(6);
        if($request->ajax()){
            return response()->json(view('administracion.usuarios.ajax-usuarios',compact('usuarios'))->render());
        }
        return view('administracion.usuarios.index',compact('usuarios'));
    }

    public function create(){
        $facultades = Facultad::all();
        $roles = Rol::all();
        $provincias = Provincia::all();
        return view("administracion.usuarios.nuevo_usuario",compact('facultades','roles','provincias'));

    }

    public function store(Request $request){
        $data = $request;
        if ($data['optradio'] == "Estudiante") {
            if ($data['nacionalidades'] == "Extranjero No Residente") {
                $this->validate($request, [
                    'id'    => [ 'required','unique:usuarios,id', ],
                    'nombres'   => [ 'required' ],
                    'apellidos' => [ 'required' ],
                    'telefono'  => [ 'required' ],
                    'pais'      => [ 'required' ],
                    'ciudad'    => [ 'required' ],
                    'direccion' => [ 'required' ],
                    'facultad'  => [ 'required' ],
                    'carrera'   => [ 'required' ],
                    'email'     => [ 'required','unique:usuarios' ],
                ]);
            } else {
                if ($data['nacionalidades'] == "Ecuatoriano") {
                    $this->validate($request, [
                        'id'    => [ 'required','validar_cedula','unique:usuarios,id', ],
                        'nombres'   => [ 'required' ],
                        'apellidos' => [ 'required' ],
                        'telefono'  => [ 'required' ],
                        'provincia' => [ 'required' ],
                        'canton'    => [ 'required' ],
                        'direccion' => [ 'required' ],
                        'facultad'  => [ 'required' ],
                        'carrera'   => [ 'required' ],
                        'email'     => [ 'required', 'unique:usuarios' ],
                    ]);
                } else {
                    $this->validate($request, [
                        'id'    => [ 'required','unique:usuarios,id', ],
                        'nombres'   => [ 'required' ],
                        'apellidos' => [ 'required' ],
                        'telefono'  => [ 'required' ],
                        'pais'      => [ 'required' ],
                        'provincia' => [ 'required' ],
                        'canton'    => [ 'required' ],
                        'direccion' => [ 'required' ],
                        'facultad'  => [ 'required' ],
                        'carrera'   => [ 'required' ],
                        'email'     => [ 'required', 'unique:usuarios' ],
                    ]);
                }
            }
            $user = new Usuario();
            $user->id = $data['id'];
            $user->nacionalidad = $data['nacionalidades'];
            $user->nombres = $data['nombres'];
            $user->apellidos = $data['apellidos'];
            $user->telefono = $data['telefono'];
            if ($data['pais'] == '') {
                $user->pais = "Ecuador";
            } else {
                $user->pais = $data['pais'];
            }
            $user->direccion = $data['direccion'];
            $user->genero = $data['radio-genero'];
            $user->id_carreras = $data['carrera'];
            $user->email = $data['email'];
            $user->password=bcrypt($data['password']);
            $user->estado = 1;
            $user->id_roles = $data['id_roles'];;
            if ($data['nacionalidades'] == "Extranjero No Residente") {
                $user->ciudad = $data['ciudad'];
            } else {
                $user->id_cantones = $data['canton'];
            }
        } else {
            if ($data['nacionalidades'] == "Extranjero No Residente") {
                $this->validate($request, [
                    'id'    => [ 'required','unique:usuarios,id', ],
                    'nombres'   => [ 'required' ],
                    'apellidos' => [ 'required' ],
                    'telefono'  => [ 'required' ],
                    'pais'      => [ 'required' ],
                    'ciudad'    => [ 'required' ],
                    'direccion' => [ 'required' ],
                    'titulo'    => [ 'required' ],
                    'email'     => [ 'required', 'unique:usuarios' ],
                ]);
            } else {
                if ($data['nacionalidades'] == "Ecuatoriano") {
                    $this->validate($request, [
                        'id'    => [ 'required','validar_cedula','unique:usuarios,id', ],
                        'nombres'   => [ 'required' ],
                        'apellidos' => [ 'required' ],
                        'telefono'  => [ 'required' ],
                        'provincia' => [ 'required' ],
                        'canton'    => [ 'required' ],
                        'direccion' => [ 'required' ],
                        'titulo'    => [ 'required' ],
                        'email'     => [ 'required','unique:usuarios' ],
                    ]);
                } else {
                    $this->validate($request, [
                        'id'    => [ 'required','unique:usuarios,id'],
                        'nombres'   => [ 'required' ],
                        'apellidos' => [ 'required' ],
                        'telefono'  => [ 'required' ],
                        'pais'      => [ 'required' ],
                        'provincia' => [ 'required' ],
                        'canton'    => [ 'required' ],
                        'direccion' => [ 'required' ],
                        'titulo'    => [ 'required' ],
                        'email'     => [ 'required', 'unique:usuarios' ],
                    ]);
                }
            }
            $user = new Usuario();
            $user->id = $data['id'];
            $user->nacionalidad = $data['nacionalidades'];
            $user->nombres = $data['nombres'];
            $user->apellidos = $data['apellidos'];
            $user->telefono = $data['telefono'];
            $user->genero = $data['radio-genero'];
            if ($data['pais'] == '') {
                $user->pais = "Ecuador";
            } else {
                $user->pais = $data['pais'];
            }
            $user->direccion = $data['direccion'];
            $user->titulo = $data['titulo'];
            $user->id_carreras = $data['carrera'];
            $user->email = $data['email'];
            $user->estado = 1;
            $user->password=bcrypt($data['password']);
            $user->id_roles = $data['id_roles'];
            if ($data['nacionalidades'] == "Extranjero No Residente") {
                $user->ciudad = $data['ciudad'];
            } else {
                $user->id_cantones = $data['canton'];
            }

        }
        if($user->save()){
            return Redirect::to('administracion/usuarios')->with('mensaje-registro', 'Usuario Actualizado Correctamente');
        }
    }

    public function edit($id){
        $facultades = Facultad::all();
        $roles = Rol::all();
        $usuario= Usuario::find($id);
        $provincias = Provincia::all();
        return View('administracion.usuarios.edit',compact('usuario','facultades','roles','provincias'));
    }

    public function update($id,Request $request){
        $data = $request;
        $user= Usuario::find($id);

        if ($data['optradio'] == "Estudiante") {
            if ($data['nacionalidades'] == "Extranjero No Residente") {
                $this->validate($request, [
                    'id'    => [ 'required',Rule::unique('usuarios')->ignore($user->id,'id'), ],
                    'nombres'   => [ 'required' ],
                    'apellidos' => [ 'required' ],
                    'telefono'  => [ 'required' ],
                    'pais'      => [ 'required' ],
                    'ciudad'    => [ 'required' ],
                    'direccion' => [ 'required' ],
                    'facultad'  => [ 'required' ],
                    'carrera'   => [ 'required' ],
                    'email'     => [ 'required',Rule::unique('usuarios')->ignore($user->id), ],
                ]);
            } else {
                if ($data['nacionalidades'] == "Ecuatoriano") {
                    $this->validate($request, [
                        'id'    => [ 'required','validar_cedula',Rule::unique('usuarios')->ignore($user->id,'id'), ],
                        'nombres'   => [ 'required' ],
                        'apellidos' => [ 'required' ],
                        'telefono'  => [ 'required' ],
                        'provincia' => [ 'required' ],
                        'canton'    => [ 'required' ],
                        'direccion' => [ 'required' ],
                        'facultad'  => [ 'required' ],
                        'carrera'   => [ 'required' ],
                        'email'     => [ 'required', Rule::unique('usuarios')->ignore($user->id), ],
                    ]);
                } else {
                    $this->validate($request, [
                        'id'    => [ 'required',Rule::unique('usuarios')->ignore($user->id,'id'), ],
                        'nombres'   => [ 'required' ],
                        'apellidos' => [ 'required' ],
                        'telefono'  => [ 'required' ],
                        'pais'      => [ 'required' ],
                        'provincia' => [ 'required' ],
                        'canton'    => [ 'required' ],
                        'direccion' => [ 'required' ],
                        'facultad'  => [ 'required' ],
                        'carrera'   => [ 'required' ],
                        'email'     => [ 'required', Rule::unique('usuarios')->ignore($user->id), ],
                    ]);
                }
            }
            $user->id = $data['id'];
            $user->nacionalidad = $data['nacionalidades'];
            $user->nombres = $data['nombres'];
            $user->apellidos = $data['apellidos'];
            $user->telefono = $data['telefono'];
            if ($data['pais'] == '') {
                $user->pais = "Ecuador";
            } else {
                $user->pais = $data['pais'];
            }
            $user->direccion = $data['direccion'];
            $user->genero = $data['radio-genero'];
            $user->id_carreras = $data['carrera'];
            $user->email = $data['email'];
            $user->estado = 1;
            $user->id_roles = $data['id_roles'];;
            if ($data['nacionalidades'] == "Extranjero No Residente") {
                $user->ciudad = $data['ciudad'];
            } else {
                $user->id_cantones = $data['canton'];
            }
        } else {
            if ($data['nacionalidades'] == "Extranjero No Residente") {
                $this->validate($request, [
                    'id'    => [ 'required',Rule::unique('usuarios')->ignore($user->id,'id'), ],
                    'nombres'   => [ 'required' ],
                    'apellidos' => [ 'required' ],
                    'telefono'  => [ 'required' ],
                    'pais'      => [ 'required' ],
                    'ciudad'    => [ 'required' ],
                    'direccion' => [ 'required' ],
                    'titulo'    => [ 'required' ],
                    'email'     => [ 'required', Rule::unique('usuarios')->ignore($user->id), ],
                ]);
            } else {
                if ($data['nacionalidades'] == "Ecuatoriano") {
                    $this->validate($request, [
                        'id'    => [ 'required','validar_cedula',Rule::unique('usuarios')->ignore($user->id,'id'), ],
                        'nombres'   => [ 'required' ],
                        'apellidos' => [ 'required' ],
                        'telefono'  => [ 'required' ],
                        'provincia' => [ 'required' ],
                        'canton'    => [ 'required' ],
                        'direccion' => [ 'required' ],
                        'titulo'    => [ 'required' ],
                        'email'     => [ 'required',Rule::unique('usuarios')->ignore($user->id), ],
                    ]);
                } else {
                    $this->validate($request, [
                        'id'    => [ 'required',Rule::unique('usuarios')->ignore($user->id,'id'), ],
                        'nombres'   => [ 'required' ],
                        'apellidos' => [ 'required' ],
                        'telefono'  => [ 'required' ],
                        'pais'      => [ 'required' ],
                        'provincia' => [ 'required' ],
                        'canton'    => [ 'required' ],
                        'direccion' => [ 'required' ],
                        'titulo'    => [ 'required' ],
                        'email'     => [ 'required', Rule::unique('usuarios')->ignore($user->id), ],
                    ]);
                }
            }
            $user->id = $data['id'];
            $user->nacionalidad = $data['nacionalidades'];
            $user->nombres = $data['nombres'];
            $user->apellidos = $data['apellidos'];
            $user->telefono = $data['telefono'];
            $user->genero = $data['radio-genero'];
            if ($data['pais'] == '') {
                $user->pais = "Ecuador";
            } else {
                $user->pais = $data['pais'];
            }
            $user->direccion = $data['direccion'];
            $user->titulo = $data['titulo'];
            $user->email = $data['email'];
            $user->estado = 1;
            $user->id_roles = $data['id_roles'];
            if ($data['nacionalidades'] == "Extranjero No Residente") {
                $user->ciudad = $data['ciudad'];
            } else {
                $user->id_cantones = $data['canton'];
            }
        }
        if($user->save()){
            return Redirect::to('administracion/usuarios')->with('mensaje-registro', 'Usuario Actualizado Correctamente');
        }



    }

    public function destroy($id, Request $request){
        $user= Usuario::find($id);
        $user->estado=0;
        $user->save();

        $message="Eliminado Correctamente";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $user->id,
                'message' => $message
            ]);
        }




    }




}
