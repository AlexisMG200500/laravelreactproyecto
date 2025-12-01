<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
     protected $table = 'carreras';

    protected $fillable = [
        'direccion_id', 'carrera', 'abreviatura', 'estatus'
    ];

    public function direccion() {
        return $this->belongsTo('App\Models\Direccion', 'direccion_id', 'id');
    }
}
