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
Route::resource('administracion/imagenes','ImagenCertificadoController');
Route::resource('administracion/firmas','FirmaController');
Route::resource('administracion/temarios','TemarioController');
Route::resource('administracion/contenidos','ContenidoController');
Route::resource('administracion/inscripciones','InscripcionController');
Route::resource('administracion/asistencias','AsistenciaController');

Route::get('administracion/validar-inscripcion','InscripcionController@getValidar');
Route::post('administracion/validar-inscripcion','InscripcionController@postValidar');


#para recuperacion de contraseña
// Password Reset Routes...
Route::get('password/reset', 'Auth\AuthController@getPasswordReset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\AuthController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


#para el select carrera-facultad
Route::get('carreras/{id}','Auth\AuthController@getCarreras');
Route::get('cantones/{id}','Auth\AuthController@getCantones');
Route::get('eventosNoMatriculados/{id}','InscripcionController@getEventosNoMatriculados');
Route::get('eventosMatriculados/{id}','InscripcionController@getEventosMatriculados');
Route::get('eventosMatriculadosValidados/{id_usuario}/','InscripcionController@getEventosMatriculadosValidados');



#perfil y editar perfil
Route::get('User/MiPerfil', 'HomeUserController@mi_perfil');
Route::get('cursos', 'CursosController@todos_cursos');
Route::get('cursos/formato', 'CursosController@cursos');
Route::get('User/MiPerfil/EditarPerfil', 'HomeUserController@editar_perfil');
Route::get('recuperar_password', 'FrontController@recuperar_pass');

Route::get('pdf', 'ReporteController@prueba');
Route::get('administracion/reportes/aprobados', 'ReporteController@getAprobados');
Route::post('administracion/reportes/aprobados', 'ReporteController@postAprobados');

Route::get('administracion/reportes/reprobados', 'ReporteController@getReprobados');
Route::post('administracion/reportes/reprobados', 'ReporteController@postReprobados');

Route::get('administracion/reportes/inscritos', 'ReporteController@getInscritos');
Route::post('administracion/reportes/inscritos', 'ReporteController@postInscritos');

Route::get('administracion/certificados/generar', 'CertificadoController@getGenerar');
Route::post('administracion/certificados/generar', 'CertificadoController@postGenerar');

Route::get('administracion/certificados/listado', 'CertificadoController@getListado');
Route::get('administracion/certificados/{id}', 'ReporteController@certificados');
Route::get('cursos/{id}', 'CursosController@cursos');











