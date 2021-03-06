<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaShow extends Model
{
    use HasFactory;

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime'
    ];

    public function cinema()
    {
        return $this->hasOneThrough(Cinema::class, CinemaHall::class, 'id', 'id', 'cinema_hall_id', 'cinema_id');
    }

    public function hall()
    {
        return $this->hasOne(CinemaHall::class, 'id', 'cinema_hall_id');
    }

    public function movie()
    {
        return $this->hasOne(CinemaMovie::class, 'id', 'movie_id');
    }

    public function reservations()
    {
        return $this->hasmany(CinemaReservation::class);
    }
}
