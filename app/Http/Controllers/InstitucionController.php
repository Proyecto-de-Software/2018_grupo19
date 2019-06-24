<?php

namespace App\Http\Controllers;

use App\Institucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->validate_i($request)->fails()){
            return response("Fallo",400);
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
            return response("Ok",200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function show(Institucion $institucion)
    {
        return $institucion;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($this->validate_i($request)->fails()){
            return response("Fallo",400);
        }else{
            try {
                Institucion::findOrFail($id)->fill($request->all())->save();
                return response("OK", 200);
            } catch (ModelNotFoundException $e) {
                return response("Fallo. ID inválido.",400);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institucion  $institucion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Institucion::findOrFail($id)->delete();
            return response("OK, el id $id", 200);
        } catch (ModelNotFoundException $e) {
            return response("Fallo. id inválido",400);
        }
    }

    public function showByRegion($idRegion)
    {
        return Institucion::where('region_sanitaria_id', $idRegion)->get();
    }

    private function validate_i($request){
        return Validator::make($request->json()->all(),[
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
