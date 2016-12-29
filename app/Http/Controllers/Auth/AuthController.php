<?php

namespace Congreso\Http\Controllers\Auth;
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
        /*
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
        */

      
    }

       protected function getLogin()
    {
        return view("login");
    }

        public function postLogin(Request $request)
   {
       $this->validate($request,[
           'id'=>['required'],
           'password'=>['required'],
       ]);
       $data = $request;
       $cedula = $data['id'];
       $password = $data['password'];

    /*
    if ($this->auth->attempt($credentials, $request->has('remember')))
    {
        return "correco";
    }
    */
       if ($this->auth->attempt(['id' => $cedula, 'password' => $password])) {
           return Redirect::to('/administracion');
       }else{
           return Redirect::to('login')->with('mensaje', 'Usuario o Contraseña Incorrectos.');

       }

   }

    protected function getRegister()
    {
        $facultades = Facultad::all();
        $carreras = Carrera::pluck('nombre','id');

        return view("registro",compact('facultades','carreras'));
    }

    protected function postRegister(Request $request)
        {
            $data = $request;
            if ($data['optradio']=="Estudiante"){
                $this->validate($request,[
                    'id'=>['required','unique:usuarios,id'],
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
                $user->password=$data['password'];
                $user->estado=1;
            }
            else{
                $this->validate($request,[
                    'id'=>['required','unique:usuarios,id'],
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
                $user->password=$data['password'];
                $user->estado=1;

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

        return redirect('login');
    }


    public function getCarreras(Request $request,$id){
           if ($request->ajax()){
               $carreras = Carrera::carreras($id);
               return response()->json($carreras);

           }


    }



}
