<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'post.title' => 'required|string|max:100',
            'post.departure_date_and_time' => 'required|max:15',
            'post.number_of_passengers' => 'required|numeric|max:2',
            'post.rideable_number_of_people' => 'required|numeric|max:2',
            'post.departure_point' => 'required|string|max:100',
            'post.arrive_point' => 'required|string|max:100',
        ];
    }
}
