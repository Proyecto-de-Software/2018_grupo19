<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    
    public function localidad() {
        return $this->belongsTo('App\Localidad');
    }

    public function region_sanitaria() {
        return $this->belongsTo('App\RegionSanitaria');
    }

    public function genero() {
        return $this->belongsTo('App\Genero');
    }

    public function tipo_doc() {
        return $this->belongsTo('App\TipoDocumento');
    }

    public function obra_social() {
        return $this->belongsTo('App\ObraSocial');
    }

}
