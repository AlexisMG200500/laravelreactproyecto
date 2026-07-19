<?php

namespace App\Services;

use App\Models\Laboratorio;
use Illuminate\Pagination\LengthAwarePaginator;

class LaboratorioService
{
    public function listar(): LengthAwarePaginator
    {
        return Laboratorio::paginate();
    }

    public function crear(array $data): Laboratorio
    {
        return Laboratorio::create($data);
    }

    public function encontrar(int $id): Laboratorio
    {
        return Laboratorio::findOrFail($id);
    }

    public function actualizar(int $id, array $data): Laboratorio
    {
        $laboratorio = Laboratorio::findOrFail($id);
        $laboratorio->update($data);

        return $laboratorio;
    }

    public function eliminar(int $id): void
    {
        Laboratorio::findOrFail($id)->delete();
    }
}
