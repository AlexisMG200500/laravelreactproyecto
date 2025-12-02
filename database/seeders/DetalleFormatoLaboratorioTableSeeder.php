<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleFormatoLaboratorioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('detalle_formato_laboratorio')
        ->insert([
            [
                'formato_laboratorio_id' => 1
                , 'material_id' => 1
                , 'unidad_medida_id' => 1
                , 'cantidad' => 20
            ]
            , [
                'formato_laboratorio_id' => 2
                , 'material_id' => 1
                , 'unidad_medida_id' => 1
                , 'cantidad' => 20
            ]
        ]);
    }
}
