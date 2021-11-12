<?php

namespace Database\Factories;

use App\Models\Curso;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class InscripcionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'curso_id' => rand(1, Curso::count()),
            'usuario_id' => rand(1, Usuario::count()),
            'estado' => 'cursando'
        ];
    }
}
