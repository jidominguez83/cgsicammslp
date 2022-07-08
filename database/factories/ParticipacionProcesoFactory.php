<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParticipacionProceso>
 */
class ParticipacionProcesoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'curp' => $this->faker->regexify('[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}'),
            'proceso_id' => $this->faker->randomDigit(),
            'tipo_valoracion_id' => $this->faker->numberBetween(1, 20),
            'ciclo' => $this->faker->randomElement(['2015-2016', '2016-2017', '2018-2019', '2019-2020', '2020-2021', '2021-2022', '2022-2023']),
            'folio_federal' => $this->faker->regexify('[0-9]{2}[A-Z]{3}[0-9]{15}'),
            'p_global' => $this->faker->randomFloat(),
            'posicion' => $this->faker->numberBetween(0, 1500),
            'estatus' => $this->faker->randomElement(['1', '2'])
        ];
    }
}
