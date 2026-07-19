<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DireccionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'direccion' => fake()->unique()->company(),
            'abreviatura' => strtoupper(fake()->unique()->lexify('???')),
            'estatus' => 'Activo',
        ];
    }

    public function inactivo(): static
    {
        return $this->state(['estatus' => 'Inactivo']);
    }
}
