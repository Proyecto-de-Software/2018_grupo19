<?php

namespace App\Http\Controllers;

use App\Institucion;
use App\RegionSanitaria;
use App\TipoInstitucion;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Institucion::all();
    }

    public function viewIndex() {
        return view('instituciones.listadoInstituciones');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instituciones.create',[
            "regiones" => RegionSanitaria::get(),
            "tiposInst" => TipoInstitucion::get()
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
        $validator = $this->validate_i($request);
        if($validator->fails()){
            return redirect('instituciones/create')
                ->withErrors($validator)
                ->withInput($request->input());
        }else{
            $institucion = new Institucion;
            $institucion->nombre = $request->nombre;
            $institucion->director = $request->director;
            $institucion->telefono = $request->telefono;
            $institucion->longitud = $request->longitud;
            $institucion->latitud = $request->latitud;
            $institucion->region_sanitaria_id = $request->region_sanitaria_id;
            $institucion->tipo_institucion_id = $request->tipo_institucion_id;
            $institucion->save();
            return redirect('instituciones');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    /*public function show(Institucion $institucion)
    {
        return $institucion;
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function edit(Institucion $institucion)
    {
        return view('instituciones.create', [
            'institucion' => $institucion,
            "regiones" => RegionSanitaria::get(),
            "tiposInst" => TipoInstitucion::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institucion $institucion)
    {
        $validator = $this->validate_i($request);
        if($validator->fails()){
            return redirect("instituciones/$institucion->id/edit")
                ->withErrors($validator)
                ->withInput($request->input());
        }else{
            $institucion->nombre = $request->nombre;
            $institucion->director = $request->director;
            $institucion->telefono = $request->telefono;
            $institucion->longitud = $request->longitud;
            $institucion->latitud = $request->latitud;
            $institucion->region_sanitaria_id = $request->region_sanitaria_id;
            $institucion->tipo_institucion_id = $request->tipo_institucion_id;
            $institucion->save();
            return redirect('instituciones');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Institucion $institucion)
    // {
    //     Institucion::findOrFail($institucion->id)->delete();
    //     return redirect('listadoInstituciones');
    // }

    public function showByRegion($idRegion)
    {
        return Institucion::where('region_sanitaria_id', $idRegion)->get();
    }

    private function validate_i($request){
        return Validator::make($request->all(),[
            'nombre' => 'required|string|min:5|max:50',
            'director' => 'required|string|min:5|max:50',
            'telefono' => 'required|string|min:6|max:50',
            'longitud' => 'required|string|min:5|max:50',
            'latitud' => 'required|string|min:5|max:50',
            'region_sanitaria_id' => 'required|integer|exists:region_sanitarias,id',
            'tipo_institucion_id' => 'required|integer|exists:tipo_institucions,id',
        ]);
    }
}
