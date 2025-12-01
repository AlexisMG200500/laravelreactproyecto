<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuatrimestre extends Model
{
    public static function validationRules() {
        return [
            'cuatrimestre' => 'required|min:5|max:100',
            'fecha_inicio'  ,
            'fecha_termino' ,
        ];
    }

    public static function attributeNames() {
        return [
            'cuatrimestre' => 'cuatrimestre',
            'fecha_inicio' => 'fecha_inicio',
            'fecha_termino' => 'fecha_termino',
        ];
    }

    public static function opcionesEstatus() {
        return [
            'Activo' => 'Activo'
            , 'Inactivo' => 'Inactivo'
        ];
    }

    protected $table = 'cuatrimestres';

    protected $fillable = [
        'cuatrimestre', 'fecha_inicio', 'fecha_termino'
    ];
}
