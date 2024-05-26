<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiante>
 */
class EstudianteFactory extends Factory
{

    public function definition()
    {
        return [
            'nombre'   => $this->faker->name(),
            'apellido' => $this->faker->lastName(),
            'foto'     => $this->faker->text()
        ];
    }
}
