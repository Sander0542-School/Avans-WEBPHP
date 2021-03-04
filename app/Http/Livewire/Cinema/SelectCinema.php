<?php

namespace App\Http\Livewire\Cinema;

use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\CinemaShow;
use Livewire\Component;

class SelectCinema extends Component
{
    public $cinemaId;

    public $cinema;


    public function render()
    {
        $cinema = Cinema::find($this->cinemaId);
        if ($cinema != null) {
            $this->emit('cinemaChanged', $cinema);
        } else {
            $this->emit('cinemaDeselected');
        }

        return view('livewire.reservation.cinema.select-cinema')->withCinemas(Cinema::orderBy('name')->get());
    }
}
