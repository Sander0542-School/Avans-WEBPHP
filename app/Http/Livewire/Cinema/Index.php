<?php

namespace App\Http\Livewire\Cinema;

use App\Models\Cinema;
use App\Models\CinemaMovie;
use App\Models\CinemaShow;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'cinemaChanged' => 'cinemaChanged',
        'decrementStep' => 'decrementStep',
        'refresh' => 'refresh',
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


    protected $rules = [
        'persons' => 'required|integer|between:1,6',
    ];

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
        $this->clearMovie();
        $this->cinema = $cinema;
        $this->cinemaId = $cinema->id;
        $this->movies = $cinema->shows()->where('start_datetime', '>', now())->get();
    }

    public function clearMovie()
    {
        $this->movie = null;
        $this->movieId = null;
        $this->persons = null;
        $this->selectPeople = false;
    }

    public function incrementStep()
    {
        $this->validate();
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


    private function resetCinema()
    {
        $this->selectStep = false;
    }

    public function refresh()
    {

    }
}
