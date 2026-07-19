<?php

namespace App\Services;

use App\Models\Direccion;
use Illuminate\Pagination\LengthAwarePaginator;

class DireccionService
{
    public function listar(): LengthAwarePaginator
    {
        return Direccion::paginate();
    }

    public function crear(array $data): Direccion
    {
        return Direccion::create($data);
    }

    public function encontrar(int $id): Direccion
    {
        return Direccion::findOrFail($id);
    }

    public function actualizar(int $id, array $data): Direccion
    {
        $direccion = Direccion::findOrFail($id);
        $direccion->update($data);

        return $direccion;
    }

    public function eliminar(int $id): void
    {
        Direccion::findOrFail($id)->delete();
    }
}
