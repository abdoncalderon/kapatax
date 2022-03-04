<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonRequest extends FormRequest
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
            'cardId'=>'required',
            'gender_id'=>'required',
            'birthDate'=>'required',
            'jobTitle'=>'nullable',
            'email'=>'nullable',
            'city_id'=>'required',
            'address'=>'nullable',
            'homePhone'=>'nullable',
            'mobilePhone'=>'nullable',
            'project_user_id'=>'nullable',
        ];
    }
}