<?php

namespace Database\Factories;

use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Vehiculo>
 */
class VehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'placa' => fake()->unique()->bothify('???###'),
            'marca' => fake()->randomElement([
                'Toyota',
                'Mazda',
                'Chevrolet',
                'Renault',
                'Kia',
                'Nissan',
                'BMW',
                'Volkswagen',
                'Mercedes-Benz',
                'Audi'
            ]),
            'modelo' => fake()->optional()->numberBetween(1990, 2025),
            'color' => fake()->optional()->safeColorName()
        ];
    }
}
