<?php

namespace Database\Factories;

use App\Models\DetalleFactura;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DetalleFactura>
 */
class DetalleFacturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cantidad' => fake()->numberBetween(1,7),
            'precio_unitario' => fake()->randomFloat(2, 10000, 450000),
            'subtotal' => 0,
        ];
    }
}
