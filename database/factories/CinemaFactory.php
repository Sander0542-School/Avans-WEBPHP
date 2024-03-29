<?php

namespace Database\Factories;

use App\Models\Cinema;
use App\Models\CinemaHall;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CinemaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cinema::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'location' => $this->faker->city,

        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Cinema $cinema) {
            $cinema->halls()->saveMany(CinemaHall::factory($this->faker->numberBetween(2,4))->create([
                'cinema_id' => $cinema->id,
            ]));
        });
    }
}
