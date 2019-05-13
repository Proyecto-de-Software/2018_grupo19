<?php
use App\Paciente;

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Rutas de pacientes

Route::get('/paciente/{id}', function ($id) {
    //Listar pacientes
});

Route::post('/paciente', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $paciente = new Paciente;
    $paciente->nombre = $request->nombre;
    $paciente->save();

    return redirect('/');
});

Route::delete('/paciente/{id}', function ($id) {
    Paciente::findOrFail($id)->delete();

    return redirect('/');
});

Route::get('/pacientes', function () {
    $pacientes = Paciente::orderBy('created_at', 'asc')->get();

    return view('pacientes.listado', [
        'pacientes' => $pacientes
    ]);
});

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
