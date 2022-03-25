<?php

namespace App\Http\Requests\People;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewPersonRequest extends FormRequest
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
            'cardId'=>'required|unique:people,cardId|min:8',
            'gender_id'=>'required',
            'birthDate'=>'required',
            'jobTitle'=>'nullable',
            'email'=>'nullable',
            'city_id'=>'required',
            'address'=>'nullable',
            'homePhone'=>'nullable',
            'mobilePhone'=>'nullable',
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
