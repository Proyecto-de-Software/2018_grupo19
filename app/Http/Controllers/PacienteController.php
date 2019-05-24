<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use ConfigPage;

//Imports para generar las opciones de los formularios
use App\Partido;
use App\Localidad;
use App\Genero;
use App\TipoDocumento;
use App\ObraSocial;

use Illuminate\Support\Facades\Log;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pacientes.index', [
            'pacientes' => Paciente::paginate(ConfigPage::getValue('cantidad_por_pag'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create', [
            'partidos' => Partido::get(),
            'localidades' => Localidad::get(),
            'generos' => Genero::get(),
            'tipos_documento' => TipoDocumento::get(),
            'obras_sociales' => ObraSocial::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Revisar el tema del validator en el quickstart con tasks
        /*$validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }*/

        $paciente = new Paciente;
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->fecha_nac = $request->fecha_nac;
        $paciente->lugar_nac = $request->lugar_nac;
        $paciente->region_sanitaria_id = $request->region_sanitaria;
        $paciente->localidad_id = $request->localidad;
        $paciente->domicilio = $request->domicilio;
        $paciente->genero_id = $request->genero;
        $paciente->tiene_documento = $request->tiene_documento ? true : false;
        $paciente->tipo_doc_id = $request->tipo_documento;
        $paciente->documento = $request->documento;
        $paciente->nro_historia_clinica = $request->nro_historia_clinica;
        $paciente->nro_carpeta = $request->nro_carpeta;
        $paciente->telefono = $request->telefono;
        $paciente->obra_social_id = $request->obra_social;
        $paciente->save();

        return redirect('/pacientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        // dd($paciente);
        return view('pacientes.show', [
            'paciente' => $paciente
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', [
            'paciente' => $paciente,
            'partidos' => Partido::get(),
            'localidades' => Localidad::get(),
            'generos' => Genero::get(),
            'tipos_documento' => TipoDocumento::get(),
            'obras_sociales' => ObraSocial::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->fecha_nac = $request->fecha_nac;
        $paciente->lugar_nac = $request->lugar_nac;
        $paciente->region_sanitaria_id = $request->region_sanitaria;
        $paciente->localidad_id = $request->localidad;
        $paciente->domicilio = $request->domicilio;
        $paciente->genero_id = $request->genero;
        $paciente->tiene_documento = $request->tiene_documento ? true : false;
        $paciente->tipo_doc_id = $request->tipo_documento;
        $paciente->documento = $request->documento;
        $paciente->nro_historia_clinica = $request->nro_historia_clinica;
        $paciente->nro_carpeta = $request->nro_carpeta;
        $paciente->telefono = $request->telefono;
        $paciente->obra_social_id = $request->obra_social;
        $paciente->save();

        return redirect('/pacientes/'.$paciente->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        Paciente::findOrFail($paciente->id)->delete();

        return redirect('/pacientes');
    }
}
