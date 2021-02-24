<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function kitchen()
    {
        return $this->hasOne(RestaurantKitchen::class);
    }

    public function reservations()
    {
        return $this->hasMany(RestaurantReservation::class);
    }
}
