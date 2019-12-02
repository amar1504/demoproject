<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressValidation extends FormRequest
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
            'name'=>'required|alpha',
            'address1'=>'required',
            'country'=>'required|alpha',
            'state'=>'required|alpha',
            'city'=>'required',
            'zipcode'=>'required|alpha_num',
            'mobileno'=>'required'
        ];
    }

      /**
     * function to display message for validation
     */
    public function messages()
    {
        // validation message for Address form start
        return [
            'name.required' => 'Name is required.',
            'address1.required' => 'Address1 is required.',
            'country.required' => 'Country is required.',
            'state.required' => 'State is required.',
            'city.required' => 'City is required.',
            'zipcode.required' => 'Zipcode is required.',
            'mobileno.required' => 'Mobileno is required.',
        ];
        // validation message for Address form end
    }
}
