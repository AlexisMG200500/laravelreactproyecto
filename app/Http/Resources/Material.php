<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Material extends JsonResource
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
            'unidad_medida_id' => $this->unidad_medida_id,
            'unidad_medida' => $this->unidad_medida->unidad_medida,
            'material' => $this->material,
            'abreviatura' => $this->abreviatura,
            'tipo' => $this->tipo,
            'estatus' => $this->estatus,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
