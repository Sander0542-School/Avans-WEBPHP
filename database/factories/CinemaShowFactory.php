<?php

namespace Database\Factories;

use App\Models\CinemaMovie;
use App\Models\CinemaReservation;
use App\Models\CinemaShow;
use Illuminate\Database\Eloquent\Factories\Factory;

class CinemaShowFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CinemaShow::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'movie_id' => CinemaMovie::inRandomOrder()->first()->id,
            'start_datetime' => $this->faker->dateTime,
            'end_datetime' => $this->faker->dateTime,
        ];
    }

    public function configure()
    {

        return $this->afterCreating(function (CinemaShow $cinemaShow) {
            $cinemaShow->reservations()->saveMany(CinemaReservation::factory(2)->create([
                'cinema_show_id' => $cinemaShow->id,
            ]));
        });
    }
}
