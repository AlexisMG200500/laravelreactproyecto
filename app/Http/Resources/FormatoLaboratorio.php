<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FormatoLaboratorio extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'grupo_laboratorio_id' => $this->grupo_laboratorio_id,
            'asignatura_id' => $this->asignatura_id,
            'asignatura' => optional($this->asignatura)->asignatura,
            'docente_id' => $this->docente_id,
            'docente' => optional($this->docente)->name,
            'numero_equipos_trabajo' => $this->numero_equipos_trabajo,
            'fecha_formato' => $this->fecha_formato,
            'nombre_practica' => $this->nombre_practica,
            'objetivo' => $this->objetivo,
            'observaciones' => $this->observaciones,
            'archivo_formato' => $this->archivo_formato,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
