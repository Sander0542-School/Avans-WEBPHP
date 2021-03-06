<?php

namespace App\Http\Livewire\Home\Restaurants;

use App\Models\RestaurantKitchen;
use Livewire\Component;

class Kitchen extends Component
{
    public $kitchenId;

    public function render()
    {
        return view('livewire.home.restaurants.kitchen', [
            'kitchen' => RestaurantKitchen::find($this->kitchenId),
        ]);
    }
}
