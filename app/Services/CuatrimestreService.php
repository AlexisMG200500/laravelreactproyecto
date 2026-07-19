<?php

namespace App\Services;

use App\Models\Cuatrimestre;
use Illuminate\Pagination\LengthAwarePaginator;

class CuatrimestreService
{
    public function listar(): LengthAwarePaginator
    {
        return Cuatrimestre::paginate();
    }

    public function crear(array $data): Cuatrimestre
    {
        return Cuatrimestre::create($data);
    }

    public function encontrar(int $id): Cuatrimestre
    {
        return Cuatrimestre::findOrFail($id);
    }

    public function actualizar(int $id, array $data): Cuatrimestre
    {
        $cuatrimestre = Cuatrimestre::findOrFail($id);
        $cuatrimestre->update($data);

        return $cuatrimestre;
    }

    public function eliminar(int $id): void
    {
        Cuatrimestre::findOrFail($id)->delete();
    }
}
