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
        Schema::create('carreras', function (Blueprint $table) {
             $table->bigIncrements('id')->comment('Identificador de la carrera');
            $table->unsignedInteger('direccion_id')->comment('Referencia a la tabla de direcciones');
            $table->string('carrera', 100)->comment('Guarda el nombre de la carrera');
            $table->string('abreviatura', 10)->comment('Guarda la abreviatura de la dirección, ejemplo: TIC');
            $table->enum('estatus', ['Activo', 'Inactivo'])->comment('Indica si el registro está o no activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
