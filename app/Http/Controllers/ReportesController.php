<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Consulta;
use Lava;

class ReportesController extends Controller
{
    public function index()
    {
        $c = Consulta::
        join('pacientes', 'pacientes.id', '=', 'consultas.paciente_id')
        ->join('generos', 'generos.id', '=', 'pacientes.genero_id')
        ->groupBy('genero_id')
        ->select('genero_id','generos.nombre',DB::raw('count(genero_id) as count'))->get();

        $this->generateChart('Consultas agrupadas por genero','genero','Genero',$c);

        $c = Consulta::
        join('motivo_consultas', 'motivo_consultas.id', '=', 'consultas.motivo_consulta_id')
        ->groupBy('motivo_consulta_id')
        ->select('motivo_consulta_id','motivo_consultas.nombre',DB::raw('count(motivo_consulta_id) as count'))->get();

        $this->generateChart('Consultas agrupadas por motivo','motivo','Motivo',$c);

        $c = Consulta::
        join('pacientes', 'pacientes.id', '=', 'consultas.paciente_id')
        ->join('localidads', 'localidads.id', '=', 'pacientes.localidad_id')
        ->groupBy('localidad_id')
        ->select('localidad_id','localidads.nombre',DB::raw('count(localidad_id) as count'))->get();

        $this->generateChart('Consultas agrupadas por localidad','localidad','Localidad',$c);

        return view('reportes');
    }

    public function generateChart($title,$id,$field,$rows)
    {
        $reasons = Lava::DataTable();

        $reasons->addStringColumn($field)
                ->addNumberColumn('Cantidad');
        
        foreach ($rows as $row) {
            $reasons->addRow([$row->nombre,$row->count]);
        }

        Lava::DonutChart($id, $reasons, [
            'title' => $title
        ]);
    }
}
