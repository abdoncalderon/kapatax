<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserProjectRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'user_id'=>'required',
            'project_id'=>'required',
            'role_id'=>'required',
        ];
    }
}
