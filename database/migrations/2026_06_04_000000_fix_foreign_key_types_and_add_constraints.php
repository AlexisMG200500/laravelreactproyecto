<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::getDriverName() !== 'mysql') {
            return;
        }
        Schema::table('carreras', function (Blueprint $table) {
            $table->unsignedBigInteger('direccion_id')->comment('Referencia a direcciones')->change();
            $table->foreign('direccion_id')->references('id')->on('direcciones')->onDelete('restrict');
        });

        Schema::table('asignaturas', function (Blueprint $table) {
            $table->unsignedBigInteger('carrera_id')->comment('Referencia a carreras')->change();
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('restrict');
        });

        Schema::table('materiales', function (Blueprint $table) {
            $table->unsignedBigInteger('unidad_medida_id')->comment('Unidad de medida')->change();
            $table->foreign('unidad_medida_id')->references('id')->on('unidades_medidas')->onDelete('restrict');
        });

        Schema::table('grupos_laboratorios', function (Blueprint $table) {
            $table->unsignedBigInteger('laboratorio_id')->comment('Laboratorio')->change();
            $table->unsignedBigInteger('cuatrimestre_id')->comment('Cuatrimestre')->change();
            $table->unsignedBigInteger('direccion_id')->comment('Dirección')->change();
            $table->unsignedBigInteger('carrera_id')->comment('Carrera')->change();
            $table->unsignedBigInteger('asignatura_id')->comment('Asignatura')->change();
            $table->unsignedBigInteger('docente_id')->comment('Docente')->change();
            $table->foreign('laboratorio_id')->references('id')->on('laboratorios')->onDelete('restrict');
            $table->foreign('cuatrimestre_id')->references('id')->on('cuatrimestres')->onDelete('restrict');
            $table->foreign('direccion_id')->references('id')->on('direcciones')->onDelete('restrict');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('restrict');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('restrict');
            $table->foreign('docente_id')->references('id')->on('users')->onDelete('restrict');
        });

        Schema::table('formatos_laboratorios', function (Blueprint $table) {
            $table->unsignedBigInteger('grupo_laboratorio_id')->comment('Grupo-Laboratorio')->change();
            $table->unsignedBigInteger('asignatura_id')->comment('Asignatura')->change();
            $table->unsignedBigInteger('docente_id')->comment('Docente')->change();
            $table->foreign('grupo_laboratorio_id')->references('id')->on('grupos_laboratorios')->onDelete('cascade');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('restrict');
            $table->foreign('docente_id')->references('id')->on('users')->onDelete('restrict');
        });

        Schema::table('detalle_formato_laboratorio', function (Blueprint $table) {
            $table->unsignedBigInteger('formato_laboratorio_id')->comment('Formato laboratorio')->change();
            $table->unsignedBigInteger('material_id')->comment('Material')->change();
            $table->unsignedBigInteger('unidad_medida_id')->comment('Unidad de medida')->change();
            $table->foreign('formato_laboratorio_id')->references('id')->on('formatos_laboratorios')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('materiales')->onDelete('restrict');
            $table->foreign('unidad_medida_id')->references('id')->on('unidades_medidas')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        if (DB::getDriverName() !== 'mysql') {
            return;
        }
        Schema::table('detalle_formato_laboratorio', function (Blueprint $table) {
            $table->dropForeign(['formato_laboratorio_id', 'material_id', 'unidad_medida_id']);
        });

        Schema::table('formatos_laboratorios', function (Blueprint $table) {
            $table->dropForeign(['grupo_laboratorio_id', 'asignatura_id', 'docente_id']);
        });

        Schema::table('grupos_laboratorios', function (Blueprint $table) {
            $table->dropForeign(['laboratorio_id', 'cuatrimestre_id', 'direccion_id', 'carrera_id', 'asignatura_id', 'docente_id']);
        });

        Schema::table('materiales', function (Blueprint $table) {
            $table->dropForeign(['unidad_medida_id']);
        });

        Schema::table('asignaturas', function (Blueprint $table) {
            $table->dropForeign(['carrera_id']);
        });

        Schema::table('carreras', function (Blueprint $table) {
            $table->dropForeign(['direccion_id']);
        });
    }
};
