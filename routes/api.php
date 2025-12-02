<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\CarrerasController;
use App\Http\Controllers\AsignaturasController;
use App\Http\Controllers\LaboratoriosController;
use App\Http\Controllers\CuatrimestresController;
use App\Http\Controllers\Unidades_MedidasController;
use App\Http\Controllers\MaterialesController;
use App\Http\Controllers\Dias_feriadosController;
use App\Http\Controllers\GruposLaboratorioController;
use App\Http\Controllers\Formatos_LaboratoriosController;
use App\Http\Controllers\Detalle_Formato_LaboratorioController;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 */

 Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('direcciones', DireccionesController::class)->except(['create', 'edit']);
    Route::resource('carreras', CarrerasController::class)->except(['create','edit']);
    Route::resource('asignaturas', AsignaturasController::class)->except(['create','edit']);
    Route::resource('laboratorios', LaboratoriosController::class)->except(['create', 'edit']);
    Route::resource('cuatrimestres', CuatrimestresController::class)->except(['create', 'edit']);
    Route::resource('unidades_medidas', Unidades_MedidasController::class)->except(['create', 'edit']);
    Route::resource('materiales', MaterialesController::class)->except(['create', 'edit']);
    Route::resource('dias_feriados', Dias_feriadosController::class)->except(['create', 'edit']);      
    Route::resource('grupos_laboratorios', GruposLaboratorioController::class)->except(['create', 'edit']); 
    Route::resource('formatos_laboratorios', Formatos_LaboratoriosController::class)->except(['create', 'edit']); 
    Route::resource('detalle_formato_laboratorio', Detalle_Formato_LaboratorioController::class)->except(['create', 'edit']); 
});