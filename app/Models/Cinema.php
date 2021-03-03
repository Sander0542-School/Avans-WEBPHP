<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    public function halls()
    {
        return $this->hasMany(CinemaHall::class);
    }

    public function shows()
    {
        return $this->hasManyThrough(CinemaShow::class, CinemaHall::class);
    }
}
