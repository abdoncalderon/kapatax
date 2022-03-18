<?php

namespace App\Http\Requests\Settings;

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
            'code'=> 'required',
            'ccc'=> 'required',
            'region_id'=> 'required', 
        ];
    }
}
