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

    public $halls = [];

    public $movies = [];

    public $movie;

    public $persons;

    public $cinema;

    public function render()
    {
        return view('livewire.reservation.cinema.index');
    }

    public $selectStep = false;
    public $selectPeople = false;

    public function cinemaChanged(Cinema $cinema)
    {
        $this->cinema = $cinema;
        //$this->movies = $cinema->shows()->where('start_datetime', '>', now() )->get();
        $this->movies = $cinema->shows()->get();

    }

    public function clearCinema()
    {
        $this->cinema = null;
        $this->movies = [];
        $this->resetCinema();
    }

    public function movieChanged(CinemaMovie $movie)
    {
        $this->movie = $movie;
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
