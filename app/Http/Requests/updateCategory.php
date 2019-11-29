<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateCategory extends FormRequest
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

    public function rules()
    {

        // validation rules for Catgory form start
        return [
            'category_name'=>'required',
            'status'=>'required',

        ];

        // validation rules for Catgory form start
    }
    

    /**
     * function to display message for validation
     */
    public function messages()
    {
        // validation message for Catgory form start
        return [
            'category_name.required' => 'Category name is required.',
            'status.required' => 'Status is required.',
        ];
        // validation message for Category form end
    }
}
