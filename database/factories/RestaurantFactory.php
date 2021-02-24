<?php

namespace Database\Factories;

use App\Models\Restaurant;
use App\Models\RestaurantReservation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'location' => $this->faker->streetAddress,
            'opens_at' => $this->faker->dateTimeBetween('today 08:00', 'today 10:00')->format('H:i:s'),
            'closes_at' => $this->faker->dateTimeBetween('today 21:00', 'today 23:00')->format('H:i:s'),
            'max_seats' => $this->faker->numberBetween(20, 80),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Restaurant $restaurant) {
            $restaurant->reservations()->saveMany(RestaurantReservation::factory($this->faker->numberBetween(30, 80))
                ->create([
                    'restaurant_id' => $restaurant->id
                ]));
        });
    }
}
