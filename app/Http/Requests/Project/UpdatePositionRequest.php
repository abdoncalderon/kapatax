<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePositionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name'=>'required',
            'function_id'=>'required',
        ];
    }
}
