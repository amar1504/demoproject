<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'email'=>'required|email|unique:users',
            'password'=>'required|alpha_num|between:8,12',
            'confirmpassword'=>'required|alpha_num|between:8,12|same:password',
            'image'=>'image|max:2048',
            'roles'=>'required',
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
            'password.required' => 'Password is required.',
            'confirmpassword.required' => 'Confirm Password is required.',
            'status.required' => 'Status is required.',
            'roles.required' => 'Role is required.',
        ];
        // validation message for user form end
    }

}
