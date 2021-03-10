<?php

namespace App\Http\Livewire\Cinema;

use Livewire\Component;

class SelectChair extends Component
{
    public $persons;

    public $show;

    public $rows = [];

    public $selectedChairs = [];

    public $reservations;


    public function render()
    {
        if($this->rows == []){

            for ($i = 1; $i <= $this->show->hall->chair_rows; $i++) {
                for ($row = 1; $row <= $this->show->hall->chair_row_seats; $row++) {
                    $this->rows[$i][$row] = [
                        'state' => 'free',
                    ];
                };
            }
        }


        foreach ($this->show->reservations as $reservation) {

            foreach ($reservation->seats as $seat) {
                if ($this->rows[$seat->row_id][$seat->seat_id]) {
                    if($seat->seat_id !=$this->show->hall->chair_row_seats)
                    {
                        $this->rows[$seat->row_id][$seat->seat_id + 1]['state'] = 'blocked';
                    }
                    if($seat->seat_id != 1)
                    {
                        $this->rows[$seat->row_id][$seat->seat_id - 1]['state'] = 'blocked';
                    }
                    $this->rows[$seat->row_id][$seat->seat_id]['state'] = 'reserved';
                }
            }
        };
        //dd($this->chairs[1][1]);
        //dd($this->show);
        return view('livewire.reservation.cinema.select-chair');
    }

    public function selectChair($row, $chair)
    {
        $counter = 0;

        [$x, $counter] = $this->CheckChairAvalibility($row, $chair, $counter);


        if ($counter == $this->persons){
            for ($x = 0; $x < $this->persons; $x++) {
                array_push($this->selectedChairs,[$row, $chair + $x]);
                $this->rows[$row][$chair + $x]['state'] = 'picked';
            }
        }

    }


    public function CheckChairAvalibility($row, $chair, int $counter): array
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
}
