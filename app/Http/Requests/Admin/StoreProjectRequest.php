<?php

namespace App\Http\Requests\Admin;

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
            'name'=>'required|unique:projects,name',
            'code'=>'required|unique:projects,code',
            'city_id'=>'required',
            'subsidiary_id'=>'required',
        ];
    }
}
