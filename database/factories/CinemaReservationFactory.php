<?php

namespace Database\Factories;

use App\Models\CinemaReservation;
use App\Models\CinemaReservationSeat;
use App\Models\CinemaShow;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CinemaReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CinemaReservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }

    public function configure()
    {

        return $this->afterCreating(function (CinemaReservation $cinemaReservation) {
            $cinemaReservation->seats()->saveMany(CinemaReservationSeat::factory(1)->create([
                'cinema_reservation_id' => $cinemaReservation->id,
            ]));
        });
    }
}
