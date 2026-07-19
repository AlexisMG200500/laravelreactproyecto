<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetalleFormatoLaboratorio extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'formato_laboratorio_id' => $this->formato_laboratorio_id,
            'material_id' => $this->material_id,
            'material' => $this->material->material,
            'unidad_medida_id' => $this->unidad_medida_id,
            'unidad_medida' => $this->unidadMedida->unidad_medida,
            'cantidad' => $this->cantidad,
        ];
    }
}
