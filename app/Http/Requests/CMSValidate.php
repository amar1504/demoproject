<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CMSValidate extends FormRequest
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
        // validation for CMS form start
        return [
            'title'=>'required',
            'description'=>'required',
            'type'=>'required',
            'status'=>'required',
        ];
        // validation for CMS form End
    }


    
    /**
     * function to display message for validation
     */
    public function messages()
    {
        // validation message for user form start
        return [
            'title.required' => 'Title is required.',
            'description.required' => 'Description is required.',
            'type.required' => 'Type is required.',
            'status.required' => 'Status is required.',
        ];
        // validation message for user form end
    }

}
