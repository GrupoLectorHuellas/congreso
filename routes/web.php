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
//Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);
#administracion
Route::resource('administracion/categorias','CategoriaController');
Route::resource('administracion/usuarios','UsuarioController');
Route::resource('administracion/expositores','ExpositorController');
Route::post('administracion/expositores/create','ExpositorController@store');
Route::resource('administracion/eventos','EventoController');
Route::resource('administracion/videos','VideoController');
Route::resource('administracion/firmas','FirmaController');
Route::resource('administracion/temarios','TemarioController');
Route::resource('administracion/contenidos','ContenidoController');
#para recuperacion de contraseña
// Password Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
#para el select carrera-facultad
Route::get('carreras/{id}','Auth\AuthController@getCarreras');
Route::get('cantones/{id}','Auth\AuthController@getCantones');
#perfil y editar perfil
Route::get('MiPerfil/EditarPerfil', 'FrontController@editarPerfil');
Route::get('MiPerfil', 'FrontController@MiPerfil');
Route::get('recuperar_password', 'FrontController@recuperar_pass');







