<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MaterialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('materiale');

        return [
            'unidad_medida_id' => ['required', 'integer', 'exists:unidades_medidas,id'],
            'material' => ['required', 'min:5', 'max:255'],
            'abreviatura' => [
                'required', 'min:1', 'max:10',
                Rule::unique('materiales', 'abreviatura')->ignore($id),
            ],
            'tipo' => ['required', Rule::in(['Equipo', 'Material', 'Reactivo'])],
            'estatus' => ['required', Rule::in(['Activo', 'Inactivo'])],
        ];
    }

    public function attributes(): array
    {
        return [
            'unidad_medida_id' => 'unidad de medida',
            'material' => 'material',
            'abreviatura' => 'abreviatura',
            'tipo' => 'tipo',
            'estatus' => 'estatus',
        ];
    }
}
