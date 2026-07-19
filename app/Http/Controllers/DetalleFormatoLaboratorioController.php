<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetalleFormatoLaboratorioRequest;
use App\Http\Resources\DetalleFormatoLaboratorio as DetalleFormatoLaboratorioResource;
use App\Models\DetalleFormatoLaboratorio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DetalleFormatoLaboratorioController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        return DetalleFormatoLaboratorioResource::collection(
            DetalleFormatoLaboratorio::with(['material:id,material', 'unidadMedida:id,unidad_medida'])->paginate()
        );
    }

    public function store(DetalleFormatoLaboratorioRequest $request): DetalleFormatoLaboratorioResource
    {
        $detalle = DetalleFormatoLaboratorio::create($request->validated());

        return new DetalleFormatoLaboratorioResource($detalle->load(['material', 'unidadMedida']));
    }

    public function show(int $id): DetalleFormatoLaboratorioResource
    {
        return new DetalleFormatoLaboratorioResource(
            DetalleFormatoLaboratorio::with(['material:id,material', 'unidadMedida:id,unidad_medida'])->findOrFail($id)
        );
    }

    public function update(DetalleFormatoLaboratorioRequest $request, int $id): DetalleFormatoLaboratorioResource
    {
        $detalle = DetalleFormatoLaboratorio::findOrFail($id);
        $detalle->update($request->validated());

        return new DetalleFormatoLaboratorioResource($detalle->load(['material', 'unidadMedida']));
    }

    public function destroy(int $id): JsonResponse
    {
        DetalleFormatoLaboratorio::findOrFail($id)->delete();

        return response()->json(['message' => 'Recurso eliminado: '.$id]);
    }
}
