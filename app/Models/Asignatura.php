<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'asignaturas';

    protected $fillable = [
        'carrera_id', 'asignatura', 'abreviatura', 'estatus'
    ];

    public function carrera() {
        return $this->belongsTo('App\Models\Carrera', 'carrera_id', 'id');
    }
}
