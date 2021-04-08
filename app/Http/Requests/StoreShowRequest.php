<?php

namespace App\Http\Requests;

use App\Rules\MaxShowsPerDay;
use Illuminate\Foundation\Http\FormRequest;

class StoreShowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cinema_hall_id' => ['required','exists:cinema_halls,id', new MaxShowsPerDay(request()->start_datetime)],
            'movie_id' => 'required|exists:cinema_movies,id',
            'start_datetime' => 'required|date|before:end_datetime',
            'end_datetime' => 'required|date|after:start_date'
        ];
    }
}
