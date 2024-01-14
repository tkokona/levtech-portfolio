<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'wish.desired_departure_date_and_time' => 'required|max:15',
            'wish.desired_number_of_passengers' => 'required|numeric|max:2',
            'wish.desired_departure_point' => 'required|string|max:100',
            'wish.desired_arrive_point' => 'required|string|max:100',
        ];
    }
}
