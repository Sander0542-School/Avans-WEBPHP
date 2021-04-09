<?php

namespace App\Http\Requests;

use App\Rules\MaxShowsPerDay;
use Illuminate\Foundation\Http\FormRequest;

class HallStoreRequest extends FormRequest
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
            'cinema' => 'required|exists:cinemas,id',
            'chair_rows' => 'required|integer|max:20|min:10',
            'chair_row_seats' => 'required|integer|max:24|min:15'
        ];
    }
}
