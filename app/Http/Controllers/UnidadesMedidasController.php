<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnidadMedidaRequest;
use App\Http\Resources\UnidadMedida as UnidadMedidaResource;
use App\Services\UnidadMedidaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UnidadesMedidasController extends Controller
{
    public function __construct(private readonly UnidadMedidaService $service) {}

    public function index(Request $request): AnonymousResourceCollection
    {
        return UnidadMedidaResource::collection($this->service->listar());
    }

    public function store(UnidadMedidaRequest $request): UnidadMedidaResource
    {
        return new UnidadMedidaResource($this->service->crear($request->validated()));
    }

    public function show(int $id): UnidadMedidaResource
    {
        return new UnidadMedidaResource($this->service->encontrar($id));
    }

    public function update(UnidadMedidaRequest $request, int $id): UnidadMedidaResource
    {
        return new UnidadMedidaResource($this->service->actualizar($id, $request->validated()));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->eliminar($id);

        return response()->json(['message' => 'Recurso eliminado: '.$id]);
    }
}
