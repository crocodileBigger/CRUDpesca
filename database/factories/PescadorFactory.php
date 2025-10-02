<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PescadorFactory extends Factory
{
    protected $model = \App\Models\Pescador::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'identidade' => $this->faker->unique()->numerify('ID####'),
            'ativo' => $this->faker->boolean(80), // 80% chance de true
        ];
    }
}
