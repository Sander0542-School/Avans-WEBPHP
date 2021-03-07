<?php

namespace App\Http\Livewire\Cinema;

use Livewire\Component;

class SelectChair extends Component
{
    public $persons;

    public $show;

    public $rows = [];

    public $reservations;

    public function mount()
    {
        //for ($i = 1; $i <= $this->show->hall->chair_rows; $i++) {
        //    for ($row = 1; $row <= $this->show->hall->chair_row_seats; $row++) {
        //        $this->rows[$i][$row] = [
        //            'state' => 'free',
        //        ];
        //    };
        //}
        //
        //foreach ($this->show->reservations as $reservation) {
        //
        //    foreach ($reservation->seats as $seat) {
        //        if ($this->rows[$seat->row_id][$seat->seat_id]) {
        //            if($this->rows[$seat->row_id][$seat->seat_id + 1])
        //            {
        //                $this->rows[$seat->row_id][$seat->seat_id]['state'] = 'blocked';
        //            }
        //            if($this->rows[$seat->row_id][$seat->seat_id - 1])
        //            {
        //                $this->rows[$seat->row_id][$seat->seat_id]['state'] = 'blocked';
        //            }
        //            $this->rows[$seat->row_id][$seat->seat_id]['state'] = 'reserved';
        //        }
        //    }
        //};
    }

    public function render()
    {
        for ($i = 1; $i <= $this->show->hall->chair_rows; $i++) {
            for ($row = 1; $row <= $this->show->hall->chair_row_seats; $row++) {
                $this->rows[$i][$row] = [
                    'state' => 'free',
                ];
            };
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

    }
}
