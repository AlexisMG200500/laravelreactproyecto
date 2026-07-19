<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LaboratorioFactory extends Factory
{
    public function definition(): array
    {
        return [
            'laboratorio' => 'Laboratorio '.fake()->unique()->word(),
            'abreviatura' => strtoupper(fake()->unique()->lexify('???')),
            'estatus' => 'Activo',
        ];
    }
}
