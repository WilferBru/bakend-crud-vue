<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    
    public function definition()
    {
        return [
            'nombre' => $this->faker->sentence(2),
            'horas'  => rand(100, 900),
        ];
    }
}
