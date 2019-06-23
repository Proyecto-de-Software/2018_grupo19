<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function edit()
    {
        return view('config.edit',[
            'titulo' => Config::where('variable','titulo')->first(),
            'mail' => Config::where('variable','mail')->first(),
            'descripcion' => Config::where('variable','descripcion')->first(),
            'cantidad_por_pag' => Config::where('variable','cantidad_por_pag')->first(),
            'estado_del_sitio' => Config::where('variable','estado_del_sitio')->first(),
        ]);
    }

    public function update(Request $request)
    {
        $config = Config::where('variable','titulo')->first();
        $config->valor = $request->titulo;
        $config->save();
        $config = Config::where('variable','mail')->first();
        $config->valor = $request->mail;
        $config->save();
        $config = Config::where('variable','descripcion')->first();
        $config->valor = $request->descripcion;
        $config->save();
        $config = Config::where('variable','cantidad_por_pag')->first();
        $config->valor = $request->cantidad_por_pag;
        $config->save();
        $config = Config::where('variable','estado_del_sitio')->first();
        //dd($request);
        if($request->estado_del_sitio == 'on' ){
            $config->valor = 1;
        }else{
            $config->valor = 0;
        }
        $config->save();

        return redirect('/');
    }

    public function redirigirSitioEnMantenimiento() {
        return view('mantenimiento');
    }

    public static function isActive(){
        return (Config::where('variable', 'estado_del_sitio')->first()->valor ? 1:0);
    }
}
