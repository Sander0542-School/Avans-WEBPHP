<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CinemaHall extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['chair_rows', 'chair_row_seats'];

    public function cinema()
    {
        return $this->hasOne(Cinema::class, 'id', 'cinema_id');
    }

    public function shows()
    {
        return $this->hasMany(CinemaShow::class, 'cinema_hall_id', 'id' );
    }
}
