<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerManagementValidation extends FormRequest
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
        // validation for banner form start
        return [
            'title'=>'required',
            'bannerimage'=>'image|max:2048',
            'status'=>'required',

        ];
        // validation for banner form end
    }


    /**
     * function to display message for validation
     */
    public function messages()
    {
        // validation message for banner form start
        return [
            'title.required' => 'Title is required.',
            'bannerimage.required' => 'Banner image is required.',
            'status.required' => 'Status is required.',
        ];
        // validation message for banner form end
    }
}
