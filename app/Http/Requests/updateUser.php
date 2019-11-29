<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateUser extends FormRequest
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
        // validation for user form start
        return [
            'firstname'=>'required|alpha',
            'lastname'=>'required|alpha',
            'email'=>'email',
            'password'=>'alpha_num|between:8,12',
            'confirmpassword'=>'alpha_num|between:8,12|same:password',
            'status'=>'required',
        ];
        // validation for user form End
    }


    /**
     * function to display message for validation
     */
    public function messages()
    {
        // validation message for user form start
        return [
            'firstname.required' => 'First name is required.',
            'lastname.required' => 'Last name is required.',
            'email.required' => 'Email is required.',
            'status.required' => 'Status is required.',
        ];
        // validation message for user form end
    }


}
