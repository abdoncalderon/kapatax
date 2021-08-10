<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'code'=> 'required|unique:countries,code',
            'ccc'=> 'required|unique:countries,ccc',
            'region_id'=> 'required', 
        ];
    }
}
