<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Asignatura extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'carrera_id' => $this->carrera_id,
            'carrera' => $this->carrera->carrera,
            'asignatura' => $this->asignatura,
            'abreviatura' => $this->abreviatura,
            'estatus' => $this->estatus,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
