<?php

namespace App\Http\Livewire\Reservation\Cinema;

use App\Models\Cinema;
use App\Models\CinemaShow;
use Livewire\Component;

class Index extends Component
{
    protected $queryString = [
        'showId'
    ];

    protected $listeners = [
        'cinemaChanged' => 'cinemaChanged',
        'decrementStep' => 'decrementStep',
        'refresh' => 'refresh',
        'cinemaDeselected' => 'clearCinema',
        'showChanged' => 'showChanged',
        'movieDeselected' => 'movieDeselect',
        'ticketsConfirmed' => 'ticketsConfirmed',
    ];

    public $cinemaId;

    public $showId;

    public $movies = [];

    public $movie;

    public $persons;

    public $selectStep = false;

    public $selectPeople = false;

    public $step = 1;

    public $show;


    protected $rules = [
        'persons' => 'required|integer|between:1,6',
    ];

    public function mount()
    {
        if (!empty($this->showId)) {
            $show = CinemaShow::find($this->showId);

            if ($show != null) {
                $this->showChanged($show);
            }
        }
    }

    public function render()
    {
        return view('livewire.reservation.cinema.index');
    }

    public function cinemaChanged(Cinema $cinema)
    {
        $this->clearMovie();
        $this->cinemaId = $cinema->id;
        $this->movies = $cinema->shows()->where('start_datetime', '>', now())->get();
    }

    public function clearMovie()
    {
        $this->movie = null;
        $this->showId = null;
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

    public function showChanged(CinemaShow $show)
    {
        $this->show = $show;
        $this->showId = $show->id;
        $this->cinemaId = $show->cinema->id;
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
