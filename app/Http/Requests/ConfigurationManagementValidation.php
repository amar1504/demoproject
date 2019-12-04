<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigurationManagementValidation extends FormRequest
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
        // validation for configuration form start
        return [
            'name'=>'required',
            'value'=>'required',
            'title'=>'required',
            'status'=>'required'
        ];
        // validation for configuration form end
    }


    /**
     * function to display message for validation
     */
    public function messages()
    {
        // validation message for configuration form start
        return [
            'name.required' => 'Name is required.',
            'value.required' => 'Value is required.',
            'title.required' => 'Title is required.',
            'status.required' => 'Status is required.',
        ];
        // validation message for configuration form end
    }

    
}
