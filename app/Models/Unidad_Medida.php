<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidad_Medida extends Model
{
     public static function validationRules() {
        return [
            'unidad_medida' => 'required|min:5|max:100',
            'abreviatura' => 'required|min:1|max:10',
            'estatus' => 'required|in:' . implode(',', self::opcionesEstatus()),
        ];
    }

    public static function attributeNames() {
        return [
            'unidad_medida' => 'dirección',
            'abreviatura' => 'abreviatura',
            'estatus' => 'estatus',
        ];
    }

    public static function opcionesEstatus() {
        return [
            'Activo' => 'Activo'
            , 'Inactivo' => 'Inactivo'
        ];
    }

    protected $table = 'unidades_medidas';
    protected $fillable = [
        'unidad_medida', 'abreviatura', 'estatus'
    ];
}
