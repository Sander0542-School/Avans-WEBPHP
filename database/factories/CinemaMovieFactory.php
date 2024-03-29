<?php

namespace Database\Factories;

use App\Models\CinemaMovie;
use Illuminate\Database\Eloquent\Factories\Factory;

class CinemaMovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CinemaMovie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->movie().' ('.$this->faker->numberBetween(1950, 2021).')',
        ];
    }
}
