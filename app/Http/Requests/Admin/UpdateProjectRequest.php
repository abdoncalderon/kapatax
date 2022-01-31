<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name'=>'required',
            'code'=>'required',
            'city_id'=>'required',
            'subsidiary_id'=>'required',
        ];
    }
}
