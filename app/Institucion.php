<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    public function region_sanitaria() {
        return $this->belongsTo('App\RegionSanitaria');
    }

    public function tipo_institucion() {
        return $this->belongsTo('App\TipoInstitucion');
    }
}
