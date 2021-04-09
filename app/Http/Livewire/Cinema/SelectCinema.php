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
        $this->cinema = Cinema::find($this->cinemaId);
        if ($this->cinema != null) {
            $this->emit('cinemaChanged', $this->cinema);
        } else {
            $this->emit('cinemaDeselected');
        }

        return view('livewire.reservation.cinema.select-cinema')->withCinemas(Cinema::orderBy('name')->get());
    }
}
