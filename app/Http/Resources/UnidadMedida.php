<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnidadMedida extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'unidad_medida' => $this->unidad_medida,
            'abreviatura' => $this->abreviatura,
            'estatus' => $this->estatus,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
