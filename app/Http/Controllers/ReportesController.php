<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Consulta;
use Lava;

class ReportesController extends Controller
{
    public function index() {
        
        $this->generateChart('motivo','Motivo',$this->getChartData('motivo_consulta',false));
        
        $this->generateChart('genero','Genero',$this->getChartData('genero',true));

        $this->generateChart('localidad','Localidad',$this->getChartData('localidad',true));

        return view('reportes');
    }

    public function generateChart($id, $field, $rows) {
        $reasons = Lava::DataTable();

        $reasons->addStringColumn($field)
                ->addNumberColumn('Cantidad');
        
        foreach ($rows as $row) {
            $reasons->addRow([$row->nombre,$row->count]);
        }

        Lava::DonutChart($id, $reasons, [
            'title' => "Consultas agrupadas por $id",
            //'png' => true
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
