<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrackOrderValidation extends FormRequest
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
            'order_id'=>'required|integer',
            'email'=>'required|email',
        ];
    }

     /**
     * function to display message for track order validation
     */
    public function messages()
    {
        // validation message for role form start
        return [
            'order_id.required' => 'Order Id is required.',
            'email.required' => 'Email is required.',
        ];
        // validation message for track order form end
    }


}
