<?php

namespace App\Http\Livewire\Cinema;

use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\CinemaShow;
use Livewire\Component;

class SelectChair extends Component
{

    public $persons;

    public $show;

    public function render()
    {
        return view('livewire.reservation.cinema.select-chair');
    }
}
