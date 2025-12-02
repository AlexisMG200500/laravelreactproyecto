<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\DiaFeriado;

class DiasFeriadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('dias_feriados')
            ->insert([
                ['id' => '2020-03-16']
                , ['id' => '2020-03-20']
            ]);
    }
}
