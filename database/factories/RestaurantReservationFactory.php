<?php

namespace Database\Factories;

use App\Models\RestaurantReservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RestaurantReservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = Carbon::make($this->faker->dateTimeBetween('-1 week', '+2 weeks'));
        $dayPart = $this->faker->numberBetween(20, 42);

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'day' => $date,
            'day_part' => $dayPart,
        ];
    }
}
