<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\EventReservation;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate = Carbon::make($this->faker->dateTimeBetween('-3 months', '+3 months'));
        $endDate = Carbon::make($this->faker->dateTimeBetween($startDate, $startDate->clone()->addDays(5)));

        return [
            'name' => $this->faker->words($this->faker->numberBetween(1, 3), true),
            'location' => $this->faker->city,
            'start_datetime' => $startDate,
            'end_datetime' => $endDate,
            'max_tickets' => $this->faker->numberBetween(2, 6),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Event $event) {
            $interval = $event->start_datetime->diff($event->end_datetime);
            $maxDiff = floor($interval->days == false ? 0 : $interval->days / 2);

            $event->reservations()->saveMany(EventReservation::factory($this->faker->numberBetween(3, 20))->create([
                'event_id' => $event->id,
                'start_date' => $this->faker->dateTimeBetween($event->start_datetime, $event->start_datetime->clone()->addDays($maxDiff)),
                'end_date' => $this->faker->dateTimeBetween($event->end_datetime->clone()->subDays($maxDiff), $event->end_datetime),
            ]));
        });
    }
}
