<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Cuatrimestre extends JsonResource
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
            'cuatrimestre' => $this->cuatrimestre,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_termino' => $this->fecha_termino,
            'estatus' => $this->estatus,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];        
    }
}
