<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaHall extends Model
{
    use HasFactory;

    public function cinema()
    {
        return $this->hasOne(Cinema::class);
    }

    public function shows()
    {
        return $this->hasMany(CinemaShow::class, 'cinema_hall_id', 'id' );
    }
}
