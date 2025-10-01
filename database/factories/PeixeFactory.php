<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peixe>
 */
class PeixeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'especie' => $this->faker->name(),
            'lugar' => $this->faker->unique()->numerify('ID####'),
            'tamanho' => $this->faker->randomFloat(2, 0, 100),
            'peso' => $this->faker->randomNumber(2, false),
        ];
    }
}
