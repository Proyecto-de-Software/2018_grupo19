<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
* API instituciones. Se deberá limitar el /create, /update, /
*/
Route::get('instituciones', 'InstitucionController@index');
Route::get('instituciones/{institucion}', 'InstitucionController@show');
Route::get('instituciones/region-sanitaria/{regionsanitaria}', 'InstitucionController@showByRegion');
Route::post('instituciones', 'InstitucionController@store');
Route::put('instituciones/{id}', 'InstitucionController@update');
Route::delete('instituciones/{id}', 'InstitucionController@destroy');
