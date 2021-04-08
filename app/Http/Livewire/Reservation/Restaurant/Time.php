<?php

namespace App\Http\Livewire\Reservation\Restaurant;

use App\Models\Restaurant;
use App\Models\RestaurantReservation;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Livewire\Component;
use Validator;

class Time extends Component
{
    public $restaurantId;

    /**
     * @var Restaurant
     */
    public $restaurant;

    public $day;

    public $dayPart;

    public $dataValid = false;

    public $selectableDates = [];

    public $selectableParts = [];

    protected function rules()
    {
        return [
            'day' => [
                'required',
                'date',
                'after:today',
            ],
            'dayPart' => [
                'required',
                'integer',
                'between:0,47',
                function ($attribute, $value, $fail) {
                    $date = Carbon::make($this->day);

                    $reservationCount = RestaurantReservation::whereRestaurantId($this->restaurantId)
                        ->whereDate('day', $date)->whereDayPart($this->dayPart)->count('id');

                    if ($reservationCount >= 10) {
                        $fail(__('reservation.event.form.day-part.errors.full'));
                    }
                },
            ],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->restaurant = Restaurant::find($this->restaurantId);

        foreach (CarbonPeriod::create('now', '+2 weeks') as $date) {
            $this->selectableDates[$date->format('Y-m-d')] = $date->format('l j F Y');
        }

        $startPart = 20;
        $endPart = 42;

        if ($this->restaurant != null) {
            $start = $this->restaurant->opens_at->startOfDay();
            $startPart = ceil($this->restaurant->opens_at->diffInMinutes($start) / 30);
            $endPart = floor($this->restaurant->closes_at->diffInMinutes($start) / 30);
        }

        for ($part = $startPart; $part <= $endPart; $part++) {
            $this->selectableParts[] = $part;
        }
    }

    public function render()
    {
        $validator = Validator::make([
            'day' => $this->day,
            'dayPart' => $this->dayPart,
        ], $this->rules());

        $this->dataValid = ! $validator->fails();

        return view('livewire.reservation.restaurant.time');
    }

    public function confirmTime()
    {
        $this->validate();

        $this->emitUp('timeConfirmed', $this->day, $this->dayPart);
    }
}
