<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantReservation extends Model
{
    use HasFactory;

    protected $casts = [
        'day' => 'date',
        'day_part' => 'integer',
    ];

    protected $fillable = [
        'restaurant_id',
        'user_id',
        'day',
        'day_part',
    ];

    public function start_time()
    {
        return $this->day->clone()->addMinutes(30 * $this->day_part);
    }

    public function restaurant()
    {
        return $this->hasOne(Restaurant::class);
    }
}
