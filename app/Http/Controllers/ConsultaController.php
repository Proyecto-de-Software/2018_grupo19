<?php

namespace App\Http\Controllers;

use App\Consulta;
use Illuminate\Http\Request;
use Validator;
use ConfigPage;

//Imports para generar las opciones de los formularios
use App\MotivoConsulta;
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
        $validator = $this->validate_c($request);

        if ($validator->fails()) {
            return redirect('consultas/create')
                ->withErrors($validator)
                ->withInput($request->input());
        }

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
        return view('consultas.create', [
            'consulta' => $consulta,
            'motivos_consultas' => MotivoConsulta::get(),
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
        $validator = $this->validate_c($request);

        if ($validator->fails()) {
            return redirect("consultas/$consulta->id/edit")
                ->withErrors($validator)
                ->withInput();
        }

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

    public function validate_c(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'fecha' => 'required|date|before_or_equal:today',
            'ariculacion_con_instituciones' => 'string',
            'diagnostico' => 'required|string',
            'observaciones' => 'string',
            'paciente_id' => 'required|integer|exists:pacientes,id',
            'motivo_consulta_id' => 'required|integer|exists:motivo_consultas,id',
            'derivacion_id' => 'required|integer|exists:institucions,id',
            'tratamiento_farmacologico_id' => 'required|integer|exists:tratamiento_farmacologicos,id',
            'acompanamiento_id' => 'required|integer|exists:acompanamientos,id',]
        );

        return $validator;
    }
}
