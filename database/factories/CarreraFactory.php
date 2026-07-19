<?php

namespace Database\Factories;

use App\Models\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarreraFactory extends Factory
{
    public function definition(): array
    {
        return [
            'direccion_id' => Direccion::factory(),
            'carrera' => fake()->unique()->sentence(3),
            'abreviatura' => strtoupper(fake()->unique()->lexify('???')),
            'estatus' => 'Activo',
        ];
    }

    public function inactivo(): static
    {
        return $this->state(['estatus' => 'Inactivo']);
    }
}
