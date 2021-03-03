<?php

namespace App\Http\Livewire\Reservation\Event;

use App\Models\Event;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Ticket extends Component
{
    public $maxTickets = 1;

    public $eventId;

    /**
     * @var Event
     */
    public $event;

    public $ticketCount = 1;

    public $dayCount;

    public $startDate;

    public $showNext = false;

    protected function rules()
    {
        return [
            'ticketCount' => [
                'required',
                'integer',
                'between:1,'.$this->maxTickets,
            ],
            'dayCount' => [
                Rule::requiredIf(function () {
                    return sizeof($this->event->days) > 1;
                }),
                Rule::in(['0', '1', '2']),
            ],
            'startDate' => [
                Rule::requiredIf(function () {
                    $eventDays = sizeof($this->event->days);

                    if ($eventDays > 1 && $this->dayCount == '1') {
                        return true;
                    }
                    if ($eventDays > 2 && $this->dayCount == '2') {
                        return true;
                    }

                    return false;
                }),
                'date',
                'after_or_equal:'.$this->event->start_datetime->format('Y-m-d'),
                'before_or_equal:'.$this->event->end_datetime->subtract(($this->dayCount == '2' ? '1' : '0').' days')->format('Y-m-d'),
            ],
        ];
    }

    public function mount()
    {
        $this->event = Event::find($this->eventId);
    }

    public function render()
    {
        $validator = \Validator::make([
            'ticketCount' => $this->ticketCount,
            'dayCount' => $this->dayCount,
            'startDate' => $this->startDate,
        ], $this->rules());

        $this->showNext = ! $validator->fails();

        return view('livewire.reservation.event.ticket');
    }

    public function confirmTicket()
    {
        $this->validate();

        $this->emitUp('ticketsConfirmed', $this->eventId, $this->ticketCount);
    }
}
