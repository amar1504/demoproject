<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordValidation extends FormRequest
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
            'oldpassword'=>'required|alpha_num|between:8,12',
            'newpassword'=>'required|alpha_num|between:8,12',
            'confirmpassword'=>'required|alpha_num|between:8,12|same:newpassword',
        ];
    }

    /**
     * function to display message for validation
     */
    public function messages()
    {
        // validation message for user Password form start
        return [
            'oldpassword.required' => 'Current Password is required.',
            'newpassword.required' => 'New Password is required.',
            'confirmpassword.required' => 'Confirm Password is required.',
            
        ];
        // validation message for user password form end
    }

}
