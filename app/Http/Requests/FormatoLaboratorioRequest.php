<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormatoLaboratorioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'grupo_laboratorio_id' => ['required', 'integer', 'exists:grupos_laboratorios,id'],
            'asignatura_id' => ['required', 'integer', 'exists:asignaturas,id'],
            'docente_id' => ['required', 'integer', 'exists:users,id'],
            'numero_equipos_trabajo' => ['required', 'integer', 'min:1'],
            'fecha_formato' => ['required', 'date'],
            'nombre_practica' => ['required', 'max:200'],
            'objetivo' => ['required'],
            'observaciones' => ['nullable'],
            'archivo_formato' => ['nullable', 'max:100'],
        ];
    }

    public function attributes(): array
    {
        return [
            'grupo_laboratorio_id' => 'grupo de laboratorio',
            'asignatura_id' => 'asignatura',
            'docente_id' => 'docente',
            'numero_equipos_trabajo' => 'número de equipos',
            'fecha_formato' => 'fecha de formato',
            'nombre_practica' => 'nombre de práctica',
            'objetivo' => 'objetivo',
        ];
    }
}
