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

//Rutas de pacientes
Route::resource('pacientes', 'PacienteController');

//Rutas de consultas

Route::get('/consulta/{id}', function ($id) {
    //Listar consultas
});

Route::post('/consulta', function (Request $request) {
    //Agregar consulta
});

Route::delete('/consulta/{id}', function ($id) {
    //Eliminar consulta
});

Route::get('/consultas', function () {
    //Listar consultas
    return view('consultas');
});
