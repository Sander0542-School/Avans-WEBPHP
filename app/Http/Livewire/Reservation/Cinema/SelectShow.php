<?php

namespace App\Http\Livewire\Reservation\Cinema;

use App\Models\Cinema;
use App\Models\CinemaShow;
use Livewire\Component;

class SelectShow extends Component
{
    public $cinemaId;

    public $shows = [];

    public $showId;

    public function mount() {
        $this->shows = Cinema::find($this->cinemaId)->shows;
    }

    public function render()
    {
        $show = CinemaShow::find($this->showId);

        if ($show != null) {
            $this->emitUp('showChanged', $show);
        } else {
            $this->emitUp('showDeselected');
        }

        return view('livewire.reservation.cinema.select-movie');
    }
}
