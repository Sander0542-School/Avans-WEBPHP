<?php

namespace App\Http\Livewire\Reservation\Restaurant;

use App\Models\Event;
use App\Models\Restaurant;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Validator;

class Selector extends Component
{
    public $restaurants = [];

    public $restaurantId;

    public $dataValid = false;

    public function getRules()
    {
        return [
            'restaurantId' => [
                'required',
                Rule::exists('restaurants', 'id'),
            ],
        ];
    }

    public function render()
    {
        $this->restaurants = Restaurant::orderBy('restaurant_kitchen_id')->orderBy('name')->get();

        $validator = Validator::make([
            'restaurantId' => $this->restaurantId,
        ], $this->getRules());

        if (! $validator->fails()) {
            $event = Restaurant::find($this->restaurantId);
            $this->emitUp('restaurantSelected', $event);
        } else {
            $this->emitUp('restaurantDeselected');
        }

        return view('livewire.reservation.restaurant.selector');
    }
}
