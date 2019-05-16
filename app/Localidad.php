<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    public function partido() {
        return $this->belongsTo('App\Partido');
    }
}
