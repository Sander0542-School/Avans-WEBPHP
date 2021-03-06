<?php

namespace App\Http\Livewire\Home;

use App\Models\RestaurantKitchen;
use Livewire\Component;

class Restaurants extends Component
{
    public function render()
    {
        return view('livewire.home.restaurants', [
            'kitchens' => RestaurantKitchen::orderBy('name')->get(),
        ]);
    }
}
