<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ComputerRequest extends FormRequest
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
            'name' => 'required|min:1|max:10' ,
            'desc' => 'required|min:1' ,
            'name_device[]' => 'min:1',
            'desc_device[]' => 'min:1',
            'type_devices_id[]' => 'min:1',
            'tag_device[]' => 'min:1',
            'status_device[]' => 'min:1',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Name can not empty' ,
            'desc.required' => 'Desc can not empty' ,
        ];  
    }

    // public function failedValidation(Validator $validator){
    //     return back()->withError('User not found by ID ' . $request->all())->withInput();
    // }
    // protected function failedValidation(Validator $validator)
    // {
    //     throw (new ValidationException($validator))
    //                 ->errorBag($this->errorBag)
    //                 ->redirectTo($this->getRedirectUrl());
    // }
}
