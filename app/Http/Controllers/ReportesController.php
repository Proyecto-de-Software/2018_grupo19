<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Consulta;
use Lava;

class ReportesController extends Controller
{
    public function index() {
        
        $data_motivo = $this->getChartData('motivo_consulta',false);
        $this->generateChart('motivo','Motivo',$data_motivo,true);
        $this->generateChart('motivo','Motivo',$data_motivo,false);
        
        $data_genero = $this->getChartData('genero',true);
        $this->generateChart('genero','Genero',$data_genero,true);
        $this->generateChart('genero','Genero',$data_genero,false);

        $data_localidad = $this->getChartData('localidad',true);
        $this->generateChart('localidad','Localidad',$data_localidad,true);
        $this->generateChart('localidad','Localidad',$data_localidad,false);

        return view('reportes');
    }

    public function generateChart($id, $field, $rows, $png) {
        $reasons = Lava::DataTable();

        $reasons->addStringColumn($field)
                ->addNumberColumn('Cantidad');
        
        foreach ($rows as $row) {
            $reasons->addRow([$row->nombre,$row->count]);
        }

        $chart_id = $png ? "{$id}_png" : $id;

        Lava::DonutChart($chart_id, $reasons, [
            'title' => "Consultas agrupadas por $id",
            'png' => $png ? true : false
        ]);
    }

    public function getChartData($table, $joinPacientes) {
        $data = Consulta::join('pacientes', 'pacientes.id', '=', 'consultas.paciente_id');
        if ($joinPacientes) {
            $data->join("{$table}s", "{$table}s.id", '=', "pacientes.{$table}_id");
        } else {
            $data->join("{$table}s", "{$table}s.id", '=', "consultas.{$table}_id");
        }
        $data->groupBy("{$table}_id")
        ->select("{$table}_id","{$table}s.nombre",DB::raw("count({$table}_id) as count"));
        
        return $data->get();
    }
}
