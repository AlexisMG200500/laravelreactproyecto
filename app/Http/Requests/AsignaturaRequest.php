<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AsignaturaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('asignatura');

        return [
            'carrera_id' => ['required', 'integer', 'exists:carreras,id'],
            'asignatura' => ['required', 'min:5', 'max:255'],
            'abreviatura' => [
                'required', 'min:1', 'max:10',
                Rule::unique('asignaturas', 'abreviatura')->ignore($id),
            ],
            'estatus' => ['required', Rule::in(['Activo', 'Inactivo'])],
        ];
    }

    public function attributes(): array
    {
        return [
            'carrera_id' => 'carrera',
            'asignatura' => 'asignatura',
            'abreviatura' => 'abreviatura',
            'estatus' => 'estatus',
        ];
    }
}
