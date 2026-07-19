<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormatoLaboratorio extends Model
{
    protected $table = 'formatos_laboratorios';

    protected $fillable = [
        'grupo_laboratorio_id',
        'asignatura_id',
        'docente_id',
        'numero_equipos_trabajo',
        'fecha_formato',
        'nombre_practica',
        'objetivo',
        'observaciones',
        'archivo_formato',
    ];

    public function grupoLaboratorio(): BelongsTo
    {
        return $this->belongsTo(GrupoLaboratorio::class, 'grupo_laboratorio_id');
    }

    public function asignatura(): BelongsTo
    {
        return $this->belongsTo(Asignatura::class, 'asignatura_id');
    }

    public function docente(): BelongsTo
    {
        return $this->belongsTo(User::class, 'docente_id');
    }
}
