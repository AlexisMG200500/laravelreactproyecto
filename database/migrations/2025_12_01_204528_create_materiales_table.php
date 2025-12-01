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
        Schema::create('materiales', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Identificador');
            $table->unsignedInteger('unidad_medida_id')->comment('Unidad de medida');
            $table->string('material', 100)->comment('Material');
            $table->string('abreviatura', 10)->comment('Abreviatura');
            $table->enum('tipo', ['Equipo', 'Material', 'Reactivo'])->comment('Tipo');
            $table->enum('estatus', ['Activo', 'Inactivo'])->comment('Indica si el registro está o no activo');
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales');
    }
};
