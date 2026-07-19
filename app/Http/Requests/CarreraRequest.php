<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CarreraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('carrera');

        return [
            'direccion_id' => ['required', 'integer', 'exists:direcciones,id'],
            'carrera' => ['required', 'min:5', 'max:255'],
            'abreviatura' => [
                'required', 'min:1', 'max:10',
                Rule::unique('carreras', 'abreviatura')->ignore($id),
            ],
            'estatus' => ['required', Rule::in(['Activo', 'Inactivo'])],
        ];
    }

    public function attributes(): array
    {
        return [
            'direccion_id' => 'dirección',
            'carrera' => 'carrera',
            'abreviatura' => 'abreviatura',
            'estatus' => 'estatus',
        ];
    }
}
