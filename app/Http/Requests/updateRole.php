<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateRole extends FormRequest
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
        // validation for role form start
        return [
            'status'=>'required',

        ];
        // validation for role form end
    }

    /**
     * function to display message for validation
     */
    public function messages()
    {
        // validation message for role form start
        return [
            'status.required' => 'Status is required.',
            
        ];
        // validation message for role form end
    }

}
