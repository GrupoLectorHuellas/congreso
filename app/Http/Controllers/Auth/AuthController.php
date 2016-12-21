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
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */



    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
      
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   


//login

       protected function getLogin()
    {
        return view("login");
    }


       

        public function postLogin(Request $request)
   {
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
           return Redirect::to('/administracion');
       }else{
           return Redirect::to('login')->with('mensaje', 'Usuario o Contraseña Incorrectos.');

       }




   }


//login

 //registro   


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
                    'cedula'=>['required','unique:usuarios,id'],
                    'nombres'=>['required'],
                    'apellidos'=>['required'],
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
            else{
                $this->validate($request,[
                    'cedula'=>['required','unique:usuarios,id'],
                    'nombres'=>['required'],
                    'apellidos'=>['required'],
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
