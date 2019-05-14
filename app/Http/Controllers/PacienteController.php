<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::orderBy('created_at', 'asc')->get();

        return view('pacientes.listado', [
            'pacientes' => $pacientes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.creacion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $paciente->tiene_documento = $request->tiene_documento ? 1 : 0;
        $paciente->tipo_doc_id = $request->tipo_documento;
        $paciente->documento = $request->documento;
        $paciente->nro_historia_clinica = $request->nro_historia_clinica;
        $paciente->nro_carpeta = $request->nro_carpeta;
        $paciente->telefono = $request->telefono;
        $paciente->obra_social_id = $request->obra_social;
        $paciente->save();
    
        return redirect('/paciente/all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        //
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
        //
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

        return redirect('/');
    }
}
