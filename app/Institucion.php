<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{

    protected $fillable = [
        'nombre', 'director', 'telefono', 'longitud', 'latitud', 'region_sanitaria_id', 'tipo_institucion_id'
    ];

    public function region_sanitaria() {
        return $this->belongsTo('App\RegionSanitaria');
    }

    public function tipo_institucion() {
        return $this->belongsTo('App\TipoInstitucion');
    }
}
