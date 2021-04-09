<?php

namespace App\Http\Requests\Admin\Restaurants;

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
                Rule::unique('App\Models\Restaurant', 'name')->ignore($this->route('restaurant')->id),
            ],
            'location' => [
                'required',
                'max:255',
            ],
            'restaurant_kitchen_id' => [
                'required',
                'integer',
                'exists:App\Models\RestaurantKitchen,id',
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
                'min:1',
            ],
        ];
    }
}
