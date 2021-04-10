<?php

namespace App\Http\Livewire\Reservation\Cinema;

use App\Models\CinemaReservation;
use Livewire\Component;

class SelectChair extends Component
{
    public $persons;

    public $show;

    public $rows = [];

    public $selectedChairs = [];

    public $reservations;

    protected $rules = [
        'selectedChairs' => 'required',
    ];

    public function render()
    {
        if ($this->rows == []) {

            for ($i = 1; $i <= $this->show->hall->chair_rows; $i++) {
                for ($row = 1; $row <= $this->show->hall->chair_row_seats; $row++) {
                    $this->rows[$i][$row] = [
                        'state' => 'free',
                    ];
                };
            }
        }

        $this->setReservations();

        return view('livewire.reservation.cinema.select-chair');
    }

    public function selectChair($row, $chair)
    {
        $counter = 0;
        if ($this->selectedChairs != []) {
            foreach ($this->selectedChairs as $selectedChair) {

                $this->rows[$selectedChair["row_id"]][$selectedChair["seat_id"]]['state'] = "free";
            }
        }

        [$x, $counter] = $this->checkChairAvalibility($row, $chair, $counter);

        if ($counter == $this->persons) {
            $this->selectedChairs = [];
            for ($x = 0; $x < $this->persons; $x++) {

                array_push($this->selectedChairs, ["row_id" => $row, "seat_id" =>$chair + $x]);
                $this->rows[$row][$chair + $x]['state'] = 'picked';

            }
        }
    }

    public function checkChairAvalibility($row, $chair, int $counter): array
    {
        for ($i = 0; $i < $this->persons; $i++) {
            if ($this->rows[$row][$chair + $i] != null) {

                if ($this->rows[$row][$chair + $i]['state'] != "blocked" && $this->rows[$row][$chair + $i]['state'] != "reserved") {
                    $counter++;
                }
            }
        }

        return [$i, $counter];
    }


    public function confirmReservation()
    {
        $user = auth()->user();
        $reservation = new CinemaReservation();
        $reservation->cinema_show_id = $this->show->id;
        $reservation->user_id = $user->id;
        $reservation->save();
        $reservation->seats()->createMany($this->selectedChairs);

        return redirect()->route('reservation.cinema.confirm', $reservation->id);
    }

    public function setReservations(): void
    {
        foreach ($this->show->reservations as $reservation) {

            foreach ($reservation->seats as $key => $seat) {
                if ($this->rows[$seat->row_id][$seat->seat_id]) {

                    if ($seat->seat_id != $this->show->hall->chair_row_seats) {

                        $this->rows[$seat->row_id][$seat->seat_id + 1]['state'] = 'blocked';
                    }
                    if ($seat->seat_id != 1) {
                        if ($reservation->seats->count() >= 1 && $key == 0) {

                            $this->rows[$seat->row_id][$seat->seat_id - 1]['state'] = 'blocked';
                        }
                    }
                    $this->rows[$seat->row_id][$seat->seat_id]['state'] = 'reserved';
                }
            }
        };
    }
}
