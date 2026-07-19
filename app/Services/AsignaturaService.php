<?php

namespace App\Services;

use App\Models\Asignatura;
use Illuminate\Pagination\LengthAwarePaginator;

class AsignaturaService
{
    public function listar(): LengthAwarePaginator
    {
        return Asignatura::with('carrera:id,carrera')->paginate();
    }

    public function crear(array $data): Asignatura
    {
        return Asignatura::create($data)->load('carrera');
    }

    public function encontrar(int $id): Asignatura
    {
        return Asignatura::with('carrera:id,carrera')->findOrFail($id);
    }

    public function actualizar(int $id, array $data): Asignatura
    {
        $asignatura = Asignatura::findOrFail($id);
        $asignatura->update($data);

        return $asignatura->load('carrera');
    }

    public function eliminar(int $id): void
    {
        Asignatura::findOrFail($id)->delete();
    }
}
