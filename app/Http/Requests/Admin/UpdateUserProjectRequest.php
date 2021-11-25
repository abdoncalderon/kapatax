<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProjectRequest extends FormRequest
{
    
    public function authorize()
    {
        return false;
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
