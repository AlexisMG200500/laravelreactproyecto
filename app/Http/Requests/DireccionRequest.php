<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DireccionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('direccione');

        return [
            'direccion' => ['required', 'min:5', 'max:255'],
            'abreviatura' => [
                'required', 'min:1', 'max:10',
                Rule::unique('direcciones', 'abreviatura')->ignore($id),
            ],
            'estatus' => ['required', Rule::in(['Activo', 'Inactivo'])],
        ];
    }

    public function attributes(): array
    {
        return [
            'direccion' => 'dirección',
            'abreviatura' => 'abreviatura',
            'estatus' => 'estatus',
        ];
    }
}
