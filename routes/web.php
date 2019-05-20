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

Route::resources([
    'pacientes' => 'PacienteController',
    'consultas'=> 'ConsultaController'
]);

Route::resource('config', 'ConfigController')->only([
    'edit', 'update'
]);
