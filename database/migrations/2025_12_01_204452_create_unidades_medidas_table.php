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
        Schema::create('unidades_medidas', function (Blueprint $table) {
             $table->bigIncrements('id')->comment('Identificador');
            $table->string('unidad_medida', 100)->comment('Unidad de medida');
            $table->string('abreviatura', 10)->comment('Abreviatura');
            $table->enum('estatus', ['Activo', 'Inactivo'])->comment('Indica si el registro está o no activo');
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades_medidas');
    }
};
