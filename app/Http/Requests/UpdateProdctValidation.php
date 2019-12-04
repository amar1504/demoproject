<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdctValidation extends FormRequest
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
        // validation rules for product validation -start
        return [
            'category_id'=>'required',
            'product_name'=>'required',
            'price'=>'required|numeric',
            'description'=>'required',
            'product_image'=>'max:2048',
            'quantity'=>'required',
            'quantity'=>'required',
            'color'=>'required',
            'size'=>'required',
            'type'=>'required',
            'status' => 'required',
        ];
        // validation rules for product validation -End

    }

      /**
     * function to display message for validation
     */
    public function messages()
    {
        // validation message for product form start
        return [
            'category_id.required' => 'Category is required.',
            'product_name.required' => 'Product name is required.',
            'price.required' => 'Price is required.',
            'description.required' => 'Description is required.',
            'quantity.required' => 'Quantity is required.',
            'color.required' => 'Colour is required.',
            'size.required' => 'Size is required.',
            'type.required' => 'Type is required.',
            'status.required' => 'Status is required.',
            
        ];
        // validation message for product form end
    }

}
