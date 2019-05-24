<?php

namespace App\Http\Controllers;

use App\Consulta;
use Illuminate\Http\Request;
use ConfigPage;

//Imports para generar las opciones de los formularios
use App\MotivoConsulta;
use App\Institucion;
use App\TratamientoFarmacologico;
use App\Acompanamiento;

use Illuminate\Support\Facades\Log;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('consultas.index', [
            'consultas' => Consulta::paginate(ConfigPage::getValue('cantidad_por_pag'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consultas.create', [
            'motivos_consultas' => MotivoConsulta::get(),
            'instituciones' => Institucion::get(),
            'tratamientos' => TratamientoFarmacologico::get(),
            'acompanamientos' => Acompanamiento::get()
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
        $consulta = new Consulta;
        $consulta->fecha = $request->fecha;
        $consulta->articulacion_con_instituciones = $request->articulacion_con_instituciones;
        $consulta->internacion = $request->internacion ? true : false;
        $consulta->diagnostico = $request->diagnostico;
        $consulta->observaciones = $request->observaciones;
        $consulta->paciente_id = $request->paciente_id;
        $consulta->motivo_consulta_id = $request->motivo_consulta_id;
        $consulta->derivacion_id = $request->derivacion_id;
        $consulta->tratamiento_farmacologico_id = $request->tratamiento_farmacologico_id;
        $consulta->acompanamiento_id = $request->acompanamiento_id;
        $consulta->save();

        return redirect('consultas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show(Consulta $consulta)
    {
        return view('consultas.show', [
            'consulta' => $consulta
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit(Consulta $consulta)
    {
        return view('consultas.edit', [
            'consulta' => $consulta,
            'motivos_consultas' => MotivoConsulta::get(),
            'instituciones' => Institucion::get(),
            'tratamientos' => TratamientoFarmacologico::get(),
            'acompanamientos' => Acompanamiento::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consulta $consulta)
    {
        $consulta->fecha = $request->fecha;
        $consulta->articulacion_con_instituciones = $request->articulacion_con_instituciones;
        $consulta->internacion = $request->internacion ? true : false;
        $consulta->diagnostico = $request->diagnostico;
        $consulta->observaciones = $request->observaciones;
        $consulta->paciente_id = $request->paciente_id;
        $consulta->motivo_consulta_id = $request->motivo_consulta_id;
        $consulta->derivacion_id = $request->derivacion_id;
        $consulta->tratamiento_farmacologico_id = $request->tratamiento_farmacologico_id;
        $consulta->acompanamiento_id = $request->acompanamiento_id;
        $consulta->save();

        return redirect('consultas/'.$consulta->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consulta $consulta)
    {
        Consulta::findOrFail($consulta->id)->delete();

        return redirect('/consultas');
    }
}
