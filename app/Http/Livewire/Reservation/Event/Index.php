<?php

namespace App\Http\Livewire\Reservation\Event;

use App\Models\Event;
use App\Models\EventReservation;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'eventSelected' => 'eventSelected',
        'eventDeselected' => 'eventDeselected',
        'ticketsConfirmed' => 'ticketsConfirmed',
    ];

    /**
     * @var Event
     */
    public $event;

    /**
     * @var \App\Models\EventReservation
     */
    public $reservation;

    public $reservationStep = 0;

    public function render()
    {
        return view('livewire.reservation.event.index');
    }

    private function resetEvent()
    {
        $this->reservationStep = $this->event == null ? 0 : 1;
    }

    public function eventSelected(Event $event)
    {
        $this->event = $event;

        $this->resetEvent();
    }

    public function eventDeselected()
    {
        $this->event = null;

        $this->resetEvent();
    }

    public function stepSelect()
    {
        $this->reservationStep = 2;
    }

    public function ticketsConfirmed($count, $startDate, $endDate)
    {
        $this->reservation = new EventReservation();
        $this->reservation->event_id = $this->event->id;
        $this->reservation->ticket_count = $count;
        $this->reservation->start_date = $startDate;
        $this->reservation->end_date = $endDate;

        $this->reservationStep = 3;
    }
}
