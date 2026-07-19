<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UnidadMedidaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('unidades_medida');

        return [
            'unidad_medida' => ['required', 'min:5', 'max:255'],
            'abreviatura' => [
                'required', 'min:1', 'max:10',
                Rule::unique('unidades_medidas', 'abreviatura')->ignore($id),
            ],
            'estatus' => ['required', Rule::in(['Activo', 'Inactivo'])],
        ];
    }

    public function attributes(): array
    {
        return [
            'unidad_medida' => 'unidad de medida',
            'abreviatura' => 'abreviatura',
            'estatus' => 'estatus',
        ];
    }
}
