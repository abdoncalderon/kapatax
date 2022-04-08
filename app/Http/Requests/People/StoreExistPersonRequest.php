<?php

namespace App\Http\Requests\People;

use Illuminate\Foundation\Http\FormRequest;

class StoreExistPersonRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
   
    public function rules()
    {
        return [
            'firstName'=>'required',
            'lastName'=>'required',
            'fullName'=>'nullable',
            'gender_id'=>'required',
            'birthDate'=>'required',
            'jobTitle'=>'nullable',
            'email'=>'nullable',
            'city_id'=>'required',
            'address'=>'nullable',
            'homePhone'=>'nullable',
            'mobilePhone'=>'required',
            'project_user_id'=>'nullable',
            'photo'=>'nullable',
            'signature'=>'nullable',
            'stakeholder_id'=>'required',
            'admissionDate'=>'required',
            'position_id'=>'required',
            'department_id'=>'required',
        ];
    }
}
