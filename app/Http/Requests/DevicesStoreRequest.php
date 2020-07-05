<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevicesStoreRequest extends FormRequest
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
            'name' => 'required|max:500',
            'desc' => 'required|max:500',
            'status' => 'required',
            'type_devices_id' => 'required|integer',
            'computers_id' => 'required|integer',

        ];
    }
}
