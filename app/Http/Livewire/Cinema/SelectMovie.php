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

    public $show;

    public $movies = [];

    public $movieId;



    public function render()
    {


        $movie = null;
        $this->show = CinemaShow::find($this->movieId);
        if($this->show != null){
            $movie = CinemaMovie::find($this->show->movie_id);
        }

        if ($movie != null) {
            $this->emitUp('movieChanged', $movie, $this->show);
        } else {
            $this->emitUp('movieDeselected');
        }

        return view('livewire.reservation.cinema.select-movie');
    }

    public function cinemaChanged(Cinema $cinema)
    {

        $this->movies = $cinema->shows()->get();

    }
}
