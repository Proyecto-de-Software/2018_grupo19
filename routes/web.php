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

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');

Auth::routes();

//Rutas de consulta
Route::get('consultas', 'ConsultaController@index')->middleware('permission:consulta_index');
Route::get('consultas/create', 'ConsultaController@create')->middleware('permission:consulta_new');
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
Route::put('pacientes/{paciente}', 'PacienteController@update')->middleware('permission:paciente_update');
Route::delete('pacientes/{paciente}', 'PacienteController@destroy')->middleware('permission:paciente_delete');

//Rutas de configuracion
Route::get('/config/edit', 'ConfigController@edit')->middleware('permission:config_index');
Route::put('/config/update', 'ConfigController@update')->middleware('permission:config_index', 'permission:config_update');
