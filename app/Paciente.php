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

    public function consultas() {
        return $this->hasMany('App\Consulta');
    }

    public function scopeNombre($query, $nombre) {
        if($nombre) {
            $query->where('nombre',  'like', $nombre . '%');
        }
    }

    public function scopeApellido($query, $apellido) {
        if($apellido) {
            $query->where('apellido', 'like', $apellido . '%');
        }
    }

    public function scopeNroDoc($query, $nro_doc) {
        if($nro_doc) {
            $query->where('documento', $nro_doc);
        }
    }

    public function scopeTipoDoc($query, $tipo_doc) {
        if($tipo_doc != 0) {
            $query->where('tipo_doc_id', $tipo_doc);
        }
    }

    public function scopeNroHistoriaClinica($query, $nro_hc) {
        if($nro_hc) {
            $query->where('nro_historia_clinica', $nro_hc);
        }
    }

}
