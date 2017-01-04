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
//Para las vistas principales
Route::get('/', 'FrontController@index');
Route::get('administracion','FrontController@admin');

//Login y Register
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::post('login2', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin2']);

Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

#administracion
Route::resource('administracion/categorias','CategoriaController');
Route::resource('administracion/usuarios','UsuarioController');
Route::resource('administracion/expositores','ExpositorController');
Route::post('administracion/expositores/create','ExpositorController@store');
Route::resource('administracion/eventos','EventoController');

//Route::get('administracion/expositores','ExpositorController@listing');




#para el select carrera-facultad
Route::get('carreras/{id}','Auth\AuthController@getCarreras');





