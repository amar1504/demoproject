<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryValidation extends FormRequest
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

        // validation rules for Catgory form start
        return [
            'category_name'=>'required|unique:categories'
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
        ];
        // validation message for Category form end
    }
}
