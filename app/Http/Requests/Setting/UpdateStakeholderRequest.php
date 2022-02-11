<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStakeholderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'name'=>'required',
            'code'=>'required',
            'taxId'=>'nullable',
            'city_id'=>'required',
            'address'=>'nullable',
            'zipCode'=>'nullable',
            'email'=>'nullable',
            'phoneNumber'=>'nullable',
            'stakeholder_type_id'=>'required',
        ];
    }
}
