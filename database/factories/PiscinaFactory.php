<?php

namespace Database\Factories;

use App\Models\Piscina;
use Illuminate\Database\Eloquent\Factories\Factory;

class PiscinaFactory extends Factory
{
    protected \$model = Piscina::class;

    public function definition(): array
    {
        return [
            'nombre' => \$this->faker->word(),
            'capacidad' => \$this->faker->numberBetween(500, 5000),
            'ubicacion' => \$this->faker->address(),
        ];
    }
}
