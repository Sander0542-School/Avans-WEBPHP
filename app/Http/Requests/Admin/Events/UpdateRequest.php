<?php

namespace App\Http\Requests\Admin\Events;

use Illuminate\Validation\Rule;

class UpdateRequest extends CreateRequest
{
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
                Rule::unique('App\Models\Event', 'name')->ignore($this->route('event')->id),
            ],
            'location' => [
                'required',
                'max:255',
            ],
            'start_datetime' => [
                'required',
                'date'
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
            ]];
    }
}
