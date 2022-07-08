<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Incidencia>
 */
class IncidenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'participacion_proceso_id' => $this->faker->numberBetween(0, 50),
            'descripcion' => $this->faker->text(),
            'estatus' => $this->faker->numberBetween(0, 10)
        ];
    }
}
