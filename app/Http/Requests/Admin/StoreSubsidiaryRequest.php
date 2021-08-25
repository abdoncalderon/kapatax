<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubsidiaryRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name'=>'required|unique:subsidiaries,name',
            'code'=>'required|unique:subsidiaries,code',
            'company_id'=>'required',
            'division_id'=>'required',
        ];
    }
}
