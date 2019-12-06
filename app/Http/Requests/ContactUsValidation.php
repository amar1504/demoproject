<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsValidation extends FormRequest
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
        return [
            'name'=>'required|alpha',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required',
        ];
    }

    /**
     * function to display message for validation
     */
    public function messages()
    {
        // validation message for contact us  form start
        return [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'subject.required' => 'Subject is required.',
            'message.required' => 'Message is required.',
        ];
        // validation message for contact us form end
    }
}
