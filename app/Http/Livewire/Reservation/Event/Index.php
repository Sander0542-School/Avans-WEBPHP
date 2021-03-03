<?php

namespace App\Http\Livewire\Reservation\Event;

use App\Models\Event;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'eventChanged' => 'eventChanged',
        'eventDeselected' => 'clearEvent',
        'ticketsConfirmed' => 'ticketsConfirmed',
    ];

    /**
     * @var Event
     */
    public $event;

    public $selectStep = false;

    public function render()
    {
        return view('livewire.reservation.event.index');
    }

    private function resetEvent()
    {
        $this->selectStep = false;
    }

    public function eventChanged(Event $event)
    {
        $this->event = $event;

        $this->resetEvent();
    }

    public function clearEvent()
    {
        $this->event = null;

        $this->resetEvent();
    }

    public function stepSelect()
    {
        $this->selectStep = true;
    }

    public function ticketsConfirmed($count, $startDate, $endDate)
    {

    }
}
