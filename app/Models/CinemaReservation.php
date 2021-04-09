<?php

namespace App\Models;

use App\Casts\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaReservation extends Model
{
    use HasFactory;

    public function show()
    {
        return $this->hasOne(CinemaShow::class, 'id', 'cinema_show_id');
    }

    public function seats()
    {
        return $this->hasMany(CinemaReservationSeat::class, 'cinema_reservation_id', 'id' );
    }
}
