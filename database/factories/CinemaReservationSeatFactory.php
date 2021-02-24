<?php

namespace Database\Factories;

use App\Models\CinemaReservationSeat;
use App\Models\CinemaShow;
use Illuminate\Database\Eloquent\Factories\Factory;

class CinemaReservationSeatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CinemaReservationSeat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'row_id' => $this->faker->numberBetween(1, 10),
            'seat_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
