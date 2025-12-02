<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

           $this->call(
            [
                UsersTableSeeder::class,
                DireccionesTableSeeder::class,
                CarrerasTableSeeder::class,  
                AsignaturasTableSeeder::class,
                LaboratoriosTableSeeder::class,
                CuatrimestresTableSeeder::class,
                Unidades_MedidasTableSeeder::class,
                MaterialesTableSeeder::class,
                DiasFeriadosTableSeeder::class,
                Grupos_LaboratoriosTableSeeder::class,
                Formatos_LaboratoriosTableSeeder::class,
                DetalleFormatoLaboratorioTableSeeder::class,
            ]
        );

        
    }
}
