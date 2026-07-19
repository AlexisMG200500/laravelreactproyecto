<?php

namespace App\Services;

use App\Models\DiaFeriado;
use Illuminate\Pagination\LengthAwarePaginator;

class DiaFeriadoService
{
    public function listar(): LengthAwarePaginator
    {
        return DiaFeriado::paginate();
    }

    public function crear(array $data): DiaFeriado
    {
        return DiaFeriado::create($data);
    }

    public function encontrar(string $id): DiaFeriado
    {
        return DiaFeriado::findOrFail($id);
    }

    public function actualizar(string $id, array $data): DiaFeriado
    {
        $diaFeriado = DiaFeriado::findOrFail($id);
        $diaFeriado->update($data);

        return $diaFeriado;
    }

    public function eliminar(string $id): void
    {
        DiaFeriado::findOrFail($id)->delete();
    }
}
