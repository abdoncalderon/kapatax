<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name'=>'required|unique:locations',
            'code'=>'required|unique:locations',
            'project_id'=>'required',
            'maxtimeopen'=>'required|unique:positions',
            'maxtimenote'=>'required|unique:positions',
            'maxtimecomment'=>'required|unique:positions',
        ];
    }
}
