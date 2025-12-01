<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoLaboratorio extends Model
{
     protected $table = 'grupos_laboratorios';

    protected $casts = [
        'dias_asignados' => 'array',
    ];
    

    protected $fillable = [
        'laboratorio_id'
        , 'cuatrimestre_id'
        , 'direccion_id'
        , 'carrera_id'
        , 'asignatura_id'
        , 'docente_id'
        , 'dias_asignados'
        , 'grupo'
        , 'lunes_inicio'
        , 'lunes_fin'
        , 'martes_inicio'
        , 'martes_fin'
        , 'miercoles_inicio'
        , 'miercoles_fin'
        , 'jueves_inicio'
        , 'jueves_fin'
        , 'viernes_inicio'
        , 'viernes_fin'
        , 'sabado_inicio'
        , 'sabado_fin'
        , 'domingo_inicio'
        , 'domingo_fin'
        , 'estatus'
    ];
    public function laboratorio() {
        return $this->belongsTo('App\Models\Laboratorio', 'laboratorio_id', 'id');
    }
    
    public function cuatrimestre() {
        return $this->belongsTo('App\Models\Cuatrimestre', 'cuatrimestre_id', 'id');
    }
    
    public function direccion() {
        return $this->belongsTo('App\Models\Direccion', 'direccion_id', 'id');
    }
    
    public function carrera() {
        return $this->belongsTo('App\Models\Carrera', 'carrera_id', 'id');
    }
    
    public function asignatura() {
        return $this->belongsTo('App\Models\Asignatura', 'asignatura_id', 'id');
    }
    
    public function docente() {
        return $this->belongsTo('App\Models\User', 'docente_id', 'id');
    }
}
