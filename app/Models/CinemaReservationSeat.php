<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaReservationSeat extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function reservation()
    {
        return $this->hasOne(CinemaReservation::class, 'id', 'cinema_reservation_id');
    }
}
