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
            'from'=>'required|email',
            'subject'=>'required',
            'body'=>'required',
            'notification_title'=>'required',
            'status'=>'required'
        ];
        // validation for configuration form end
    }

    public function messages()
    {
        // validation message for configuration form start
        return [
            'from.required' => 'From is required.',
            'subject.required' => 'Subject is required.',
            'body.required' => 'Body is required.',
            'notification_title.required' => 'Notification is required.',
            'status.required' => 'Status is required.',
        ];
        // validation message for configuration form end
    }

    
}
