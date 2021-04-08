<?php

namespace Database\Factories;

use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\CinemaShow;
use Illuminate\Database\Eloquent\Factories\Factory;

class CinemaHallFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CinemaHall::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'chair_rows' => $this->faker->numberBetween(10, 20),
            'chair_row_seats' => $this->faker->numberBetween(15, 24),

        ];
    }

    public function configure()
    {

        return $this->afterCreating(function (CinemaHall $cinemaHall) {
            $cinemaHall->shows()->saveMany(CinemaShow::factory(2)->create([
                'cinema_hall_id' => $cinemaHall->id,
            ]));
        });
    }
}
