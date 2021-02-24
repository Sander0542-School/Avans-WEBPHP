<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantKitchen extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}
