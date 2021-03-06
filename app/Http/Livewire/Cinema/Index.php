<?php

namespace App\Http\Livewire\Cinema;

use App\Models\Cinema;
use App\Models\CinemaHall;
use App\Models\CinemaMovie;
use App\Models\CinemaShow;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'cinemaChanged' => 'cinemaChanged',
        'cinemaDeselected' => 'clearCinema',
        'movieChanged' => 'movieChanged',
        'movieDeselected' => 'movieDeselect',
        'ticketsConfirmed' => 'ticketsConfirmed',
    ];

    public $cinemaId;

    public $movieId;

    public $movies = [];

    public $movie;

    public $persons;

    public $cinema;

    public $selectStep = false;

    public $selectPeople = false;

    public $step;

    public $show;
    public function mount()
    {
        $this->step = 1;
    }

    public function render()
    {
        return view('livewire.reservation.cinema.index');
    }

    public function cinemaChanged(Cinema $cinema)
    {
        $this->cinema = $cinema;
        $this->cinemaId = $cinema->id;
        //$this->movies = $cinema->shows()->where('start_datetime', '>', now() )->get();
        $this->movies = $cinema->shows()->get();


    }

    public function clearCinema()
    {
        $this->cinema = null;
        $this->movies = [];
        $this->resetCinema();
    }

    public function incrementStep()
    {
        $this->step++;
    }
    public function decrementStep()
    {
        $this->step--;
    }

    public function movieChanged(CinemaMovie $movie, CinemaShow  $show)
    {
        $this->movie = $movie;
        $this->show = $show;
        $this->movieId = $movie->id;
        $this->selectPeople = true;

    }

    public function movieDeselect()
    {
        $this->selectPeople = false;

    }

    public function clearMovie()
    {
        $this->movie = null;
    }

    private function resetCinema()
    {
        $this->selectStep = false;
    }
}
