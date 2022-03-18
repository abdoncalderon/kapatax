<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'stakeholder_person_id'=>'required',
            'position_id'=>'required',
            'department_id'=>'required',
            'leader_id'=>'nullable',
            'businessEmail'=>'nullable',
            'hiredSince'=>'nullable',
            'contratedUntil'=>'required',
            'salary'=>'required',
            'admissionDate'=>'nullable',
            'departureDate'=>'nullable',
            'contractFile'=>'nullable',
            'isActive'=>'required',
        ];
    }
}
