<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMaterialRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'project_id'=>'required',
            'name'=>'required',
            'description'=>'nullable',
            'sku'=>'required',
            'upc'=>'nullable',
            'model_id'=>'required',
            'subcategory_id'=>'required',
            'group_id'=>'nullable',
            'partOf'=>'nullable',
            'unity_id'=>'required',
            'weight'=>'nullable',
            'volume'=>'nullable'
        ];
    }
}
