<?php

namespace App\Http\Requests\Admin\Events;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => [
                'required',
                'max:255',
                'unique:events,name',
            ],
            'location' => [
                'required',
                'max:255',
            ],
            'start_datetime' => [
                'required',
                'date',
                'after:today'
            ],
            'end_datetime' => [
                'required',
                'date',
                'after:start_datetime'
            ],
            'max_tickets' => [
                'required',
                'integer',
                'min:1'
            ]
        ];
    }
}
