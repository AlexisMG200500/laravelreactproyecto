<?php

namespace App\Services;

use App\Models\UnidadMedida;
use Illuminate\Pagination\LengthAwarePaginator;

class UnidadMedidaService
{
    public function listar(): LengthAwarePaginator
    {
        return UnidadMedida::paginate();
    }

    public function crear(array $data): UnidadMedida
    {
        return UnidadMedida::create($data);
    }

    public function encontrar(int $id): UnidadMedida
    {
        return UnidadMedida::findOrFail($id);
    }

    public function actualizar(int $id, array $data): UnidadMedida
    {
        $unidadMedida = UnidadMedida::findOrFail($id);
        $unidadMedida->update($data);

        return $unidadMedida;
    }

    public function eliminar(int $id): void
    {
        UnidadMedida::findOrFail($id)->delete();
    }
}
