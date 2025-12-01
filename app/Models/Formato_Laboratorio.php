<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formato_Laboratorio extends Model
{
    public static function validationRules() {
        return [
            'grupo_laboratorio_id'=>'required|integer' ,
            'asignatura_id' =>'required|integer',
            'docente_id' =>'required|integer',
            'numero_equipos_trabajo'=>'required|integer',
            'fecha_formato',
            'nombre_practica',
            'objetivo',
            'observaciones',
            'archivo_formato',
        ];
    }

    public static function attributeNames() {
        return [
            'grupo_laboratorio_id'=>'grupo_laboratorio_id' ,
            'asignatura_id' =>'asignatura_id',
            'docente_id' =>'docente_id',
            'numero_equipos_trabajo'=>'numero_equipos_trabajo',
            'fecha_formato'=>'fecha_formato',
            'nombre_practica'=>'nombre_practica',
            'objetivo'=>'objetivo',
            'observaciones'=>'observaciones',
            'archivo_formato'=>'archivo_formato',
        ];
    }

    protected $table = 'formatos_laboratorios';

    protected $fillable = [
        'grupo_laboratorio_id'
        ,'asignatura_id'
        ,'docente_id'
        ,'numero_equipos_trabajo'
        ,'fecha_formato'
        ,'nombre_practica'
        ,'objetivo'
        ,'observaciones'
        ,'archivo_formato'
    ];

    public function grupo_laboratorio() {
        return $this->belongsTo('App\Models\GrupoLaboratorio', 'grupo_laboratorio_id', 'id');
    }

    public function asignatura() {
        return $this->belongsTo('App\Models\Asignatura', 'asignatura_id', 'id');
    }

    public function docente() {
        return $this->belongsTo('App\Models\User', 'docente_id', 'id');
    }
}
