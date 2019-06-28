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

//Ruta de sitio en mantenimiento
Route::get('mantenimiento', 'ConfigController@redirigirSitioEnMantenimiento');

//Rutas de login (sin middleware de mantenimiento)
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->middleware('usuarioBloqueado');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('usuarioBloqueado', 'Auth\LoginController@showUsuarioBloqueado');

//Grupo de rutas con middlware sitio mantenimiento requirido
Route::group(['middleware' => ['sitioMantenimiento']], function () {

    //Pagina principal
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    //Rutas de usuarios
    Route::get('users', 'UserController@index')->middleware('permission:user_index');
    Route::get('users/create', 'UserController@create')->middleware('permission:user_new');
    Route::post('users', 'UserController@store')->middleware('permission:user_new');
    Route::get('users/{user}', 'UserController@show')->middleware('permission:user_show');
    Route::get('users/{user}/edit', 'UserController@edit')->middleware('permission:user_update');
    Route::put('users/{user}', 'UserController@update')->middleware('permission:user_update');
    Route::delete('users/{user}', 'UserController@destroy')->middleware('permission:user_delete');

    //Rutas de consulta
    Route::get('consultas', 'ConsultaController@index')->middleware('permission:consulta_index');
    Route::get('consultas/create/{paciente_id}', 'ConsultaController@create')->middleware('permission:consulta_new');
    Route::post('consultas', 'ConsultaController@store')->middleware('permission:consulta_new');
    Route::get('consultas/{consulta}', 'ConsultaController@show')->middleware('permission:consulta_show');
    Route::get('consultas/{consulta}/edit', 'ConsultaController@edit')->middleware('permission:consulta_update');
    Route::put('consultas/{consulta}', 'ConsultaController@update')->middleware('permission:consulta_update');
    Route::delete('consultas/{consulta}', 'ConsultaController@destroy')->middleware('permission:consulta_delete');

    //Rutas de paciente
    Route::get('pacientes', 'PacienteController@index')->middleware('permission:paciente_index');
    Route::get('pacientes/create', 'PacienteController@create')->middleware('permission:paciente_new');
    Route::post('pacientes', 'PacienteController@store')->middleware('permission:paciente_new');
    Route::get('pacientes/{paciente}', 'PacienteController@show')->middleware('permission:paciente_show');
    Route::get('pacientes/{paciente}/edit', 'PacienteController@edit')->middleware('permission:paciente_update');
    Route::get('pacientes/derivaciones/{paciente}', 'PacienteController@derivations')->middleware('permission:paciente_show');
    Route::put('pacientes/{paciente}', 'PacienteController@update')->middleware('permission:paciente_update');
    Route::delete('pacientes/{paciente}', 'PacienteController@destroy')->middleware('permission:paciente_delete');
    Route::get('pacientes/nn/create', 'PacienteController@create_nn')->middleware('permission:paciente_new');
    Route::post('pacientes/nn', 'PacienteController@store_nn')->middleware('permission:paciente_new');

    //Rutas de instituciones
    Route::get('instituciones', 'InstitucionController@viewIndex');
    Route::get('instituciones/create', 'InstitucionController@create')->middleware('permission:institucion_new');
    Route::post('instituciones', 'InstitucionController@store')->middleware('permission:institucion_new');
    Route::get('instituciones/{institucion}/edit', 'InstitucionController@edit')->middleware('permission:institucion_update');
    Route::put('instituciones/{institucion}', 'InstitucionController@update')->middleware('permission:institucion_update');

    //Rutas de reportes
    Route::get('/reportes', 'ReportesController@index')->middleware('auth');

});

Route::get('/config/edit', 'ConfigController@edit')->middleware('permission:config_index');
Route::put('/config/update', 'ConfigController@update')->middleware('permission:config_index', 'permission:config_update');





