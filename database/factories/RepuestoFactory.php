<?php

namespace Database\Factories;

use App\Models\Repuesto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Repuesto>
 */
class RepuestoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => fake()->unique->bothify('REP-####'),
            'nombre' => fake()->words(3, true),
            'cantidad' => fake()->numberBetween(20,100),
            'precio' => fake()->randomFloat(2, 5000, 500000),
        ];
    }
}
