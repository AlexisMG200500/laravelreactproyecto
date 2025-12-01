<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
     public static function validationRules() {
        return [
            'direccion' => 'required|min:5|max:100',
            'abreviatura' => 'required|min:1|max:10',
            'estatus' => 'required|in:' . implode(',', self::opcionesEstatus()),
        ];
    }

    public static function attributeNames() {
        return [
            'direccion' => 'dirección',
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

    protected $table = 'direcciones';
    
    protected $fillable = [
        'direccion', 'abreviatura', 'estatus'
    ];
}
