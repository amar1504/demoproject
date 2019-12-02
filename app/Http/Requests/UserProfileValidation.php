<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileValidation extends FormRequest
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
            'firstname'=>'required|alpha',
            'lastname'=>'required|alpha',
            'email'=>'required|email',
        ];
    }


     /**
     * function to display message for validation
     */
    public function messages()
    {
        // validation message for user profile form start
        return [
            'firstname.required' => 'First Name  is required.',
            'lastname.required' => 'Last Name is required.',
            'email.required' => 'Email is required.',
        ];
        // validation message for user profile form end
    }

}
