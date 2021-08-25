<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required', 
            'code'=>'nullable',
            'isActive'=>'nullable', 
            'isLocked'=>'nullable',
        ];
    }
}
