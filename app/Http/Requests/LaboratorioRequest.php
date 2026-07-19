<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LaboratorioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('laboratorio');

        return [
            'laboratorio' => ['required', 'min:5', 'max:255'],
            'abreviatura' => [
                'required', 'min:1', 'max:10',
                Rule::unique('laboratorios', 'abreviatura')->ignore($id),
            ],
            'estatus' => ['required', Rule::in(['Activo', 'Inactivo'])],
        ];
    }

    public function attributes(): array
    {
        return [
            'laboratorio' => 'laboratorio',
            'abreviatura' => 'abreviatura',
            'estatus' => 'estatus',
        ];
    }
}
