<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Proyecto;

class ProyectoFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Proyecto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => 'Proyecto '.$this->faker->unique()->word,
            'descripcion' => $this->faker->paragraph,
            'categoria' => 'Categoria '.$this->faker->numberBetween(1, 10),
            'precio' => $this->faker->randomFloat(2, 500, 10000),
            'estado' => $this->faker->numberBetween(1, 4),
        ];
    }
}
