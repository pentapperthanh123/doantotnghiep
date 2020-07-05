<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceRequest extends FormRequest
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
        return[
            'name' => 'required|max:500',
            'desc' => 'required|max:500',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Name can not empty',
            'name.max' => 'Name so long',
            'name.unique' => 'Name is unique',
            'desc.required' => 'description can not empty',
            'desc.max' => 'Name so long'
        ];
         
    }
}
