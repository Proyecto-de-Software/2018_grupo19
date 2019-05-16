<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{

    public function paciente() {
        return $this->belongsTo('App\Paciente');
    }

    public function motivo_consulta() {
        return $this->belongsTo('App\MotivoConsulta');
    }

    public function derivacion() {
        return $this->belongsTo('App\Institucion');
    }

    public function tratamiento_farmacologico() {
        return $this->belongsTo('App\TratamientoFarmacologico');
    }

    public function acompanamiento() {
        return $this->belongsTo('App\Acompanamiento');
    }
}
