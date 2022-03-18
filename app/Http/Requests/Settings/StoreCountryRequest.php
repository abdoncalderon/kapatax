<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class StoreCountryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|unique:countries,name', 
            'code'=> 'required|unique:countries,code',
            'ccc'=> 'required',
            'region_id'=> 'required',
        ];
    }
}
