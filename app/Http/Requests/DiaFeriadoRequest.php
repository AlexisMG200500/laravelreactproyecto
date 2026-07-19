<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DiaFeriadoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('dias_feriado');

        return [
            'id' => [
                'required',
                'date_format:Y-m-d',
                Rule::unique('dias_feriados', 'id')->ignore($id),
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'id' => 'día feriado',
        ];
    }
}
