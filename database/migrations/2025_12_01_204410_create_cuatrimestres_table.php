<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cuatrimestres', function (Blueprint $table) {
               $table->bigIncrements('id')->comment('Identificador');
            $table->string('cuatrimestre', 100)->comment('Nombre del cuatrimestre');
            $table->date('fecha_inicio')->comment('Fecha de inicio');
            $table->date('fecha_termino')->comment('Fecha de término');
            $table->enum('estatus', ['Activo', 'Inactivo'])->comment('Indica si el registro está o no activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuatrimestres');
    }
};
