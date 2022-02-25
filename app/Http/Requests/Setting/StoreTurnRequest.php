<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class StoreTurnRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name'=>'required',
            'start'=>'required',
            'finish'=>'required',
        ];
    }
}
