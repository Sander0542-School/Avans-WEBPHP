<?php

namespace App\Rules;

use App\Models\CinemaShow;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class ShowPlayingSameHall implements Rule
{

    private $startDateTime;

    private $endDateTime;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($startDateTime, $endDateTime)
    {
        $this->startDateTime = $startDateTime;
        $this->endDateTime = $endDateTime;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $start = Carbon::parse($this->startDateTime);
        $end = Carbon::parse($this->endDateTime);

            $countShow = CinemaShow::where(function ($query) use ($start) {
               $query->where('start_datetime', '<=', $start);
               $query->where('end_datetime', '>=', $start);
           })->Where(function ($query) use ($end) {
               $query->where('start_datetime', '<=', $end);
               $query->where('end_datetime', '>=', $end);
           })->where('cinema_hall_id', $value)->count();

        if($countShow > 0)
        {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Op dit tijdstip draait er al een film in deze zaal';
    }
}
