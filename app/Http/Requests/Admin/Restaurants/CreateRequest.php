<?php

namespace App\Http\Requests\Admin\Restaurants;

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
            'restaurant_kitchen_id' => [
                'required',
                'integer',
                'exists:App\Models\RestaurantKitchen,id'
            ],
            'opens_at' => [
                'required',
                'date_format:H:i',
            ],
            'closes_at' => [
                'required',
                'date_format:H:i',
            ],
            'max_seats' => [
                'required',
                'integer',
                'min:1'
            ]
        ];
    }
}
