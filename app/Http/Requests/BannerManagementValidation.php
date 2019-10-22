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
            'title'=>'required|alpha',
            'bannerimage'=>'required|image|max:2048'

        ];
        // validation for banner form end
    }
}
