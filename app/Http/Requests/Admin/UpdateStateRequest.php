<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;


class UpdateStateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {   
        
        return [
            'country_id'=>'required',
        ];
    }

    
}
