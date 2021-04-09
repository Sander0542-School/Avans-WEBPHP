<?php

namespace App\Rules;

use App\Models\CinemaShow;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class MaxShowsPerDay implements Rule
{

    private $startDateTime;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($startDateTime)
    {
        $this->startDateTime = $startDateTime;
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
        $countShow = CinemaShow::where('cinema_hall_id', $value)->whereDate('start_datetime', $start->format('Y.m.d'))->count();

        if($countShow >= 3)
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
        return 'Op deze dag draaien er al 3 films in deze zaal.';
    }
}
