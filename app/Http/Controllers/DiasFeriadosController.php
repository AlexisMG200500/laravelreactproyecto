<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiaFeriadoRequest;
use App\Http\Resources\DiaFeriado as DiaFeriadoResource;
use App\Services\DiaFeriadoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DiasFeriadosController extends Controller
{
    public function __construct(private readonly DiaFeriadoService $service) {}

    public function index(Request $request): AnonymousResourceCollection
    {
        return DiaFeriadoResource::collection($this->service->listar());
    }

    public function store(DiaFeriadoRequest $request): DiaFeriadoResource
    {
        return new DiaFeriadoResource($this->service->crear($request->validated()));
    }

    public function show(string $id): DiaFeriadoResource
    {
        return new DiaFeriadoResource($this->service->encontrar($id));
    }

    public function update(DiaFeriadoRequest $request, string $id): DiaFeriadoResource
    {
        return new DiaFeriadoResource($this->service->actualizar($id, $request->validated()));
    }

    public function destroy(string $id): JsonResponse
    {
        $this->service->eliminar($id);

        return response()->json(['message' => 'Recurso eliminado: '.$id]);
    }
}
