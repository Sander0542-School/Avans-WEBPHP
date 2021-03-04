<?php

namespace App\Http\Livewire\Cinema;

use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\CinemaMovie;
use App\Models\CinemaShow;
use Livewire\Component;

class SelectMovie extends Component
{
    protected $listeners = [
        'cinemaChanged' => 'cinemaChanged',
    ];

    public $cinemaId;

    public $cinema;

    public $movies = [];

    public $movie;



    public function render()
    {
        $movie = CinemaMovie::find($this->movie);
        if ($movie != null) {
            $this->emitUp('movieChanged', $movie);
        } else {
            $this->emitUp('movieDeselected');
        }

        return view('livewire.reservation.cinema.select-movie');
    }

    public function cinemaChanged(Cinema $cinema)
    {

        $this->movies = $cinema->shows()->get();
        //dd($this->movies);

    }
}
