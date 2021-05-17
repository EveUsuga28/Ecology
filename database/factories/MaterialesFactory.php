<?php

namespace Database\Factories;

use App\Models\material;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = material::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return array(
           /* 'NomreMaterial'=>$this->faker->sentence,
            'Puntaje'=>$this->faker->numberBetween([10,100]),
            'Kilos'=>$this->faker->numberBetween([10,100]),
            'Foto'=>$this->faker->*/
        );
    }
}

