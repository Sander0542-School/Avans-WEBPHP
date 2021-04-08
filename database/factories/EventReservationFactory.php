<?php

namespace Database\Factories;

use App\Models\EventReservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventReservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'ticket_count' => $this->faker->numberBetween(1,3),
            'picture' => 'reservations/event/example.jpg'
        ];
    }
}
