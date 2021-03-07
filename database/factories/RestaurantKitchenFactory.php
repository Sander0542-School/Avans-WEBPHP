<?php

namespace Database\Factories;

use App\Models\Restaurant;
use App\Models\RestaurantKitchen;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantKitchenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RestaurantKitchen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->foodName(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (RestaurantKitchen $kitchen) {
            $kitchen->restaurants()->saveMany(Restaurant::factory($this->faker->numberBetween(2, 10))->create([
                'restaurant_kitchen_id' => $kitchen->id,
            ]));
        });
    }
}
