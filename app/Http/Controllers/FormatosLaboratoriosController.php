<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormatoLaboratorioRequest;
use App\Http\Resources\FormatoLaboratorio as FormatoLaboratorioResource;
use App\Models\FormatoLaboratorio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FormatosLaboratoriosController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        return FormatoLaboratorioResource::collection(
            FormatoLaboratorio::with([
                'asignatura:id,asignatura',
                'docente:id,name',
            ])->paginate()
        );
    }

    public function store(FormatoLaboratorioRequest $request): FormatoLaboratorioResource
    {
        $formato = FormatoLaboratorio::create($request->validated());

        return new FormatoLaboratorioResource($formato->load(['asignatura', 'docente']));
    }

    public function show(int $id): FormatoLaboratorioResource
    {
        return new FormatoLaboratorioResource(
            FormatoLaboratorio::with(['asignatura:id,asignatura', 'docente:id,name'])->findOrFail($id)
        );
    }

    public function update(FormatoLaboratorioRequest $request, int $id): FormatoLaboratorioResource
    {
        $formato = FormatoLaboratorio::findOrFail($id);
        $formato->update($request->validated());

        return new FormatoLaboratorioResource($formato->load(['asignatura', 'docente']));
    }

    public function destroy(int $id): JsonResponse
    {
        FormatoLaboratorio::findOrFail($id)->delete();

        return response()->json(['message' => 'Recurso eliminado: '.$id]);
    }
}
