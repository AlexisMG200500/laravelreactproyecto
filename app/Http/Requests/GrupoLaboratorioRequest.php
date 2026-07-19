<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GrupoLaboratorioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('grupos_laboratorio');

        return [
            'laboratorio_id' => ['required', 'integer', 'exists:laboratorios,id'],
            'cuatrimestre_id' => ['required', 'integer', 'exists:cuatrimestres,id'],
            'direccion_id' => ['required', 'integer', 'exists:direcciones,id'],
            'carrera_id' => ['required', 'integer', 'exists:carreras,id'],
            'asignatura_id' => ['required', 'integer', 'exists:asignaturas,id'],
            'docente_id' => ['required', 'integer', 'exists:users,id'],
            'dias_asignados' => ['required', 'array'],
            'grupo' => [
                'required', 'max:10',
                Rule::unique('grupos_laboratorios', 'grupo')->ignore($id),
            ],
            'lunes_inicio' => ['nullable', 'date_format:H:i'],
            'lunes_fin' => ['nullable', 'date_format:H:i'],
            'martes_inicio' => ['nullable', 'date_format:H:i'],
            'martes_fin' => ['nullable', 'date_format:H:i'],
            'miercoles_inicio' => ['nullable', 'date_format:H:i'],
            'miercoles_fin' => ['nullable', 'date_format:H:i'],
            'jueves_inicio' => ['nullable', 'date_format:H:i'],
            'jueves_fin' => ['nullable', 'date_format:H:i'],
            'viernes_inicio' => ['nullable', 'date_format:H:i'],
            'viernes_fin' => ['nullable', 'date_format:H:i'],
            'sabado_inicio' => ['nullable', 'date_format:H:i'],
            'sabado_fin' => ['nullable', 'date_format:H:i'],
            'domingo_inicio' => ['nullable', 'date_format:H:i'],
            'domingo_fin' => ['nullable', 'date_format:H:i'],
            'estatus' => ['required', Rule::in(['Activo', 'Inactivo'])],
        ];
    }

    public function attributes(): array
    {
        return [
            'laboratorio_id' => 'laboratorio',
            'cuatrimestre_id' => 'cuatrimestre',
            'direccion_id' => 'dirección',
            'carrera_id' => 'carrera',
            'asignatura_id' => 'asignatura',
            'docente_id' => 'docente',
            'dias_asignados' => 'días asignados',
            'grupo' => 'grupo',
            'estatus' => 'estatus',
        ];
    }
}
