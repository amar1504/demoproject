<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleValidate extends FormRequest
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
            'role_name'=>'required',

        ];
        // validation for role form end
    }

    public function messages()
    {
        // validation message for role form start
        return [
            'role_name.required' => 'Role name is required.',
            
        ];
        // validation message for role form end
    }

}
