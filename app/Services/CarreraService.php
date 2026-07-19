<?php

namespace App\Services;

use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CarreraService
{
    public function listar(Request $request): LengthAwarePaginator
    {
        $allowedSortFields = ['carrera', 'abreviatura', 'estatus'];
        $allowedOrders = ['asc', 'desc'];

        $sortBy = in_array($request->ordenar_por, $allowedSortFields)
            ? $request->ordenar_por
            : 'carrera';

        $order = in_array($request->orden, $allowedOrders)
            ? $request->orden
            : 'asc';

        $estatus = in_array($request->estatus, ['Activo', 'Inactivo'])
            ? $request->estatus
            : 'Activo';

        return Carrera::with('direccion:id,direccion')
            ->when($request->carrera, fn ($q) => $q->where('carrera', 'like', '%'.$request->carrera.'%'))
            ->when($request->abreviatura, fn ($q) => $q->where('abreviatura', 'like', '%'.$request->abreviatura.'%'))
            ->where('estatus', $estatus)
            ->orderBy($sortBy, $order)
            ->paginate();
    }

    public function crear(array $data): Carrera
    {
        return Carrera::create($data)->load('direccion');
    }

    public function encontrar(int $id): Carrera
    {
        return Carrera::with('direccion:id,direccion')->findOrFail($id);
    }

    public function actualizar(int $id, array $data): Carrera
    {
        $carrera = Carrera::findOrFail($id);
        $carrera->update($data);

        return $carrera->load('direccion');
    }

    public function eliminar(int $id): void
    {
        Carrera::findOrFail($id)->delete();
    }
}
