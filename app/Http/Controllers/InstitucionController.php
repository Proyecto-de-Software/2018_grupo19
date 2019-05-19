<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institucion;
use Illuminate\Support\Facades\Log;

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Institucion::where('id', $id)->get();
    }

    public function showByRegion($idRegion)
    {
        Log::info("Entrando showbyregion con region $idRegion");
        return Institucion::where('region_sanitaria_id', $idRegion)->get();
    }
}
