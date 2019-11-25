<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponValidation extends FormRequest
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
        // validation rules for Coupon -start
        return [
            'coupon_title'=>'required',
            'code'=>'required|unique:coupons',
            'description'=>'required',
            'discount'=>'required',
            'type'=>'required',
        ];
        // validation rules for Coupon -End

    }


    /**
     * function to display message for validation
     */
    public function messages()
    {
        // validation message for Coupon form start
        return [
            'coupon_title.required' => 'Coupon Title is required.',
            'code.required' => 'Code is required.',
            'description.required' => 'Description is required.',
            'discount.required' => 'Discount is required.',
            'type.required' => 'Type is required.',
        ];
        // validation message for coupon form end
    }

}
