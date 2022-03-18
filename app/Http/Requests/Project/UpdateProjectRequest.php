<?php

namespace App\Http\Requests\Project;

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
            'taxId'=>'nullable',
            'city_id'=>'required',
            'address'=>'nullable',
            'zipCode'=>'nullable',
            'phoneNumber'=>'nullable',
            'startDate'=>'nullable',
            'finishDate'=>'nullable',
            'stakeholderLogo1_id'=>'nullable',
            'stakeholderLogo2_id'=>'nullable',
            'stakeholderLogo3_id'=>'nullable',
            'stakeholderLogo4_id'=>'nullable',
        ];
    }
}
