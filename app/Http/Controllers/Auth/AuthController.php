<?php

namespace Congreso\Http\Controllers\Auth;
use Congreso\Canton;
use Congreso\Provincia;
use Congreso\Usuario;
use Congreso\Facultad;
use Congreso\Carrera;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Congreso\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{

    public function __construct(Guard $auth)
    {

        $this->auth = $auth;
        //$this->middleware('guest', ['except' => 'getLogout']);


      
    }

       protected function getLogin()
    {
        return view("login");
    }

    public function postLogin(Request $request) {
           $this->validate($request,[
               'cedula'=>['required'],
               'password'=>['required'],
           ]);
           $data = $request;
           $cedula = $data['cedula'];
           $password = $data['password'];

        /*
        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            return "correco";
        }
        */
           if ($this->auth->attempt(['id' => $cedula, 'password' => $password])) {
               return Redirect::to('administracion');
           }else{
               return Redirect::to('login')->with('mensaje', 'Usuario o Contraseña Incorrectos.');

           }

    }

    public function postLogin2(Request $request) {
        $this->validate($request,[
            'cedula'=>['required'],
            'password'=>['required'],
        ]);
        $data = $request;
        $cedula = $data['cedula'];
        $password = $data['password'];

        /*
        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            return "correco";
        }
        */
        if ($this->auth->attempt(['id' => $cedula, 'password' => $password])) {
            return Redirect::to('administracion');
        }else{
            return Redirect::to('/')->with('mensaje', 'Usuario o Contraseña Incorrectos.');

        }

    }

    protected function getRegister()
    {
        $facultades = Facultad::all();
        //$carreras = Carrera::pluck('nombre','id');
        $provincias = Provincia::all();


        return view("registro",compact('facultades','provincias'));
    }

    protected function postRegister(Request $request)
        {
            $data = $request;
            if ($data['optradio']=="Estudiante"){
                if ($data['nacionalidades']=="Extranjero No Residente"){
                    $this->validate($request,[
                        'cedula'=>['required','unique:usuarios,id'],
                        'nombres'=>['required'],
                        'apellidos'=>['required'],
                        'telefono'=>['required'],
                        'pais'=>['required'],
                        'ciudad'=>['required'],
                        'direccion'=>['required'],
                        'facultad'=>['required'],
                        'carrera'=>['required'],
                        'email'=>['required','unique:usuarios'],
                        'password'=>['required'],
                    ]);
                }else if ($data['nacionalidades']=="Ecuatoriano"){
                    $this->validate($request,[
                        'cedula'=>['required','unique:usuarios,id'],
                        'nombres'=>['required'],
                        'apellidos'=>['required'],
                        'telefono'=>['required'],
                        'provincia' => [ 'required' ],
                        'canton'    => [ 'required' ],
                        'direccion'=>['required'],
                        'facultad'=>['required'],
                        'carrera'=>['required'],
                        'email'=>['required','unique:usuarios'],
                        'password'=>['required'],
                    ]);
                }
                else {
                    $this->validate($request, [
                        'cedula'    => [ 'required', 'unique:usuarios,id' ],
                        'nombres'   => [ 'required' ],
                        'apellidos' => [ 'required' ],
                        'telefono'  => [ 'required' ],
                        'pais'      => [ 'required' ],
                        'provincia' => [ 'required' ],
                        'canton'    => [ 'required' ],
                        'direccion'=>['required'],
                        'facultad'  => [ 'required' ],
                        'carrera'   => [ 'required' ],
                        'email'     => [ 'required', 'unique:usuarios' ],
                        'password'  => [ 'required' ],
                    ]);
                }
                $user=new Usuario;
                $user->id=$data['cedula'];
                $user->nacionalidad=$data['nacionalidades'];
                $user->nombres=$data['nombres'];
                $user->apellidos=$data['apellidos'];
                $user->telefono=$data['telefono'];
                if ($data['pais']==''){
                    $user->pais="Ecuador";
                }else{
                $user->pais=$data['pais'];}
                $user->direccion=$data['direccion'];
                $user->genero=$data['radio-genero'];
                $user->id_carreras=$data['carrera'];
                $user->email=$data['email'];
                $user->password=$data['password'];
                $user->estado=1;
                $user->id_roles=3;
                if ($data['nacionalidades']=="Extranjero No Residente"){
                    $user->ciudad=$data['ciudad'];
                }else {
                    $user->id_cantones=$data['canton'];
                }
            }
            else{
                if ($data['nacionalidades']=="Extranjero No Residente"){
                    $this->validate($request,[
                        'cedula'=>['required','unique:usuarios,id'],
                        'nombres'=>['required'],
                        'apellidos'=>['required'],
                        'telefono'=>['required'],
                        'pais'=>['required'],
                        'ciudad'=>['required'],
                        'direccion'=>['required'],
                        'titulo'=>['required'],
                        'email'=>['required','unique:usuarios'],
                        'password'=>['required'],
                    ]);
                }
                else if ($data['nacionalidades']=="Ecuatoriano"){
                    $this->validate($request,[
                        'cedula'=>['required','unique:usuarios,id'],
                        'nombres'=>['required'],
                        'apellidos'=>['required'],
                        'telefono'=>['required'],
                        'provincia' => [ 'required' ],
                        'canton'    => [ 'required' ],
                        'direccion'=>['required'],
                        'titulo'=>['required'],
                        'email'=>['required','unique:usuarios'],
                        'password'=>['required'],
                    ]);
                }
                else {
                    $this->validate($request, [
                        'cedula'    => [ 'required', 'unique:usuarios,id' ],
                        'nombres'   => [ 'required' ],
                        'apellidos' => [ 'required' ],
                        'telefono'  => [ 'required' ],
                        'pais'      => [ 'required' ],
                        'provincia' => [ 'required' ],
                        'canton'    => [ 'required' ],
                        'direccion'=>['required'],
                        'titulo'=>['required'],
                        'email'     => [ 'required', 'unique:usuarios' ],
                        'password'  => [ 'required' ],
                    ]);
                }
                $user=new Usuario;
                $user->id=$data['cedula'];
                $user->nacionalidad=$data['nacionalidades'];
                $user->nombres=$data['nombres'];
                $user->apellidos=$data['apellidos'];
                $user->telefono=$data['telefono'];
                $user->genero=$data['radio-genero'];
                if ($data['pais']==''){
                    $user->pais="Ecuador";
                }else{
                    $user->pais=$data['pais'];}
                $user->direccion=$data['direccion'];
                $user->titulo=$data['titulo'];
                $user->email=$data['email'];
                $user->password=$data['password'];
                $user->estado=1;
                $user->id_roles=3;
                if ($data['nacionalidades']=="Extranjero No Residente"){
                    $user->ciudad=$data['ciudad'];
                }else {
                    $user->id_cantones=$data['canton'];
                }

            }

            if($user->save()){
                return Redirect::to('login')->with('mensaje-registro', 'Usuario Registrado Correctamente, Inicie Sesion.');

            }

}

//registro

protected function getLogout()
    {
        $this->auth->logout();

        Session::flush();

        return redirect('/');
    }


    public function getCarreras(Request $request,$id){
           if ($request->ajax()){
               $carreras = Carrera::carreras($id);
               return response()->json($carreras);

           }
    }

    public function getCantones(Request $request,$id){
        if ($request->ajax()){
            $cantones = Canton::cantones($id);
            return response()->json($cantones);

        }
    }



}
