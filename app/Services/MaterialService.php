<?php

namespace App\Services;

use App\Models\Material;
use Illuminate\Pagination\LengthAwarePaginator;

class MaterialService
{
    public function listar(): LengthAwarePaginator
    {
        return Material::with('unidadMedida:id,unidad_medida')->paginate();
    }

    public function crear(array $data): Material
    {
        return Material::create($data)->load('unidadMedida');
    }

    public function encontrar(int $id): Material
    {
        return Material::with('unidadMedida:id,unidad_medida')->findOrFail($id);
    }

    public function actualizar(int $id, array $data): Material
    {
        $material = Material::findOrFail($id);
        $material->update($data);

        return $material->load('unidadMedida');
    }

    public function eliminar(int $id): void
    {
        Material::findOrFail($id)->delete();
    }
}
