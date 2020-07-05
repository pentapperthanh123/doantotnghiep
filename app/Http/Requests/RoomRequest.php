<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'name' => 'required|min:1|max:200',
            'desc' => 'required|min:1',
        ];
    }

    public function messages () 
    {
         return [            
            'name.required' => 'Name is required',            
            'desc.required'  => 'Desc is required',           
            'status.unique'  => 'Status is exists',                     
        ];
    }
}
