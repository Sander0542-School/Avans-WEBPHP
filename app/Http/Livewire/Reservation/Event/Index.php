<?php

namespace App\Http\Livewire\Reservation\Event;

use App\Models\Event;
use App\Models\EventReservation;
use Livewire\Component;

class Index extends Component
{
    protected $queryString = [
        'eventId'
    ];

    protected $listeners = [
        'eventSelected' => 'eventSelected',
        'eventDeselected' => 'eventDeselected',
        'ticketsConfirmed' => 'ticketsConfirmed',
        'pictureUploaded' => 'pictureConfirmed',
    ];

    /**
     * @var Event
     */
    public $event;

    public $eventId;

    public $reservationStep = 0;

    public $reservation = [];

    public function mount()
    {
        if (!empty($this->eventId)) {
            $event = Event::find($this->eventId);

            $this->eventSelected($event);
        }
    }

    public function render()
    {
        return view('livewire.reservation.event.index');
    }

    private function resetEvent()
    {
        $this->reservationStep = $this->event == null ? 0 : 1;
        $this->eventId = $this->event == null ? null : $this->event->id;
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
        $this->reservation['ticket_count'] = $count;
        $this->reservation['start_date'] = $startDate;
        $this->reservation['end_date'] = $endDate;

        $this->reservationStep = 3;
    }

    public function pictureConfirmed($path)
    {
        if ($this->reservation != null) {
            $this->reservation['picture'] = $path;

            $this->reservationStep = 4;
        } else {
            $this->reservationStep = 2;
        }
    }

    public function finishReservation()
    {
        $this->reservation['event_id'] = $this->event->id;
        $this->reservation['user_id'] = auth()->user()->id;

        if (EventReservation::create($this->reservation) != null) {
            $this->reservationStep = 5;
        } else {
            $this->reservationStep = 6;
        }
    }

    public function goHome()
    {
        $this->redirectRoute('home');
    }
}
