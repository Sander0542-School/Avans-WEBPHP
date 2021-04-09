<?php

namespace App\Http\Livewire\Reservation\Cinema;

use App\Models\Cinema;
use Livewire\Component;

class SelectCinema extends Component
{
    public $cinemaId;

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
