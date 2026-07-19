<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CuatrimestreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cuatrimestre' => ['required', 'min:5', 'max:255'],
            'fecha_inicio' => ['required', 'date'],
            'fecha_termino' => ['required', 'date', 'after:fecha_inicio'],
            'estatus' => ['required', Rule::in(['Activo', 'Inactivo'])],
        ];
    }

    public function attributes(): array
    {
        return [
            'cuatrimestre' => 'cuatrimestre',
            'fecha_inicio' => 'fecha de inicio',
            'fecha_termino' => 'fecha de término',
            'estatus' => 'estatus',
        ];
    }
}
