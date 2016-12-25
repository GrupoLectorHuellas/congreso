<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Congreso\Usuario;
Route::get('/', function () {
    return view('welcome');
});
//Login y Register
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('administracion', function(){
    return view('administracion.index');
});
Route::get('administracion/usuarios/agregar','UsuarioController@getRegister');

Route::resource('administracion/categorias','CategoriaController');
Route::resource('administracion/usuarios','UsuarioController');

Route::get('carreras/{id}','Auth\AuthController@getCarreras');

Route::get('administracion/usuario/carreras/{id}','Auth\AuthController@getCarreras');

Route::get('administracion/usuarios/ajax/usuarios',function(){
    $usuarios= Usuario::where('estado',1)->paginate(1);
    return View::make('administracion.usuarios.for-usuarios',['usuarios' => $usuarios])->render();
});

