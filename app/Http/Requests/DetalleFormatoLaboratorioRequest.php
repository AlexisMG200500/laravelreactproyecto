<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleFormatoLaboratorioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'formato_laboratorio_id' => ['required', 'integer', 'exists:formatos_laboratorios,id'],
            'material_id' => ['required', 'integer', 'exists:materiales,id'],
            'unidad_medida_id' => ['required', 'integer', 'exists:unidades_medidas,id'],
            'cantidad' => ['required', 'integer', 'min:1'],
        ];
    }

    public function attributes(): array
    {
        return [
            'formato_laboratorio_id' => 'formato de laboratorio',
            'material_id' => 'material',
            'unidad_medida_id' => 'unidad de medida',
            'cantidad' => 'cantidad',
        ];
    }
}
