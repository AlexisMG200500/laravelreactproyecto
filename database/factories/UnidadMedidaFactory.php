<?php

namespace Database\Factories;

use App\Models\UnidadMedida;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnidadMedidaFactory extends Factory
{
    protected $model = UnidadMedida::class;

    public function definition(): array
    {
        return [
            'unidad_medida' => fake()->unique()->word().' medida',
            'abreviatura' => strtoupper(fake()->unique()->lexify('??')),
            'estatus' => 'Activo',
        ];
    }
}
