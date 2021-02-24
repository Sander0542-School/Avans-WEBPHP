<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantReservation extends Model
{
    use HasFactory;

    protected $casts = [
        'start_at' => 'datetime'
    ];

    public function restaurant()
    {
        return $this->hasOne(Restaurant::class);
    }
}
