<?php

namespace Database\Factories;

use App\Models\Cita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cita>
 */
class CitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehiculo_id' => \App\Models\Vehiculo::factory(),
            'fecha'=> fake()->dateTimeBetween('-6 months', 'now'),
            'hora' => fake()->time(),
            'motivo'=> fake()->sentence(),
            'agendada' => fake()->boolean(40),
        ];
    }
}
