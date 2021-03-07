<?php

namespace Database\Factories;

use App\Models\CinemaMovie;
use App\Models\CinemaReservation;
use App\Models\CinemaShow;
use Carbon\Carbon;
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
        $startDate = Carbon::make($this->faker->dateTimeBetween('-3 months', '+3 months'));
        $endDate = Carbon::make($this->faker->dateTimeBetween($startDate->clone()->addMinutes(60), $startDate->clone()->addMinutes(180)));

        return [
            'movie_id' => CinemaMovie::inRandomOrder()->first()->id,
            'start_datetime' => $startDate,
            'end_datetime' => $endDate,
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
