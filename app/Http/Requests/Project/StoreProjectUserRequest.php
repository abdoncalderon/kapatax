<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectUserRequest extends FormRequest
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
            'project_role_id'=>'required',
        ];
    }
}
