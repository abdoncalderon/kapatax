<?php

namespace App\Http\Requests\People;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'person_id'=>'required',
            'stakeholder_id'=>'required',
            'position_id'=>'nullable',
            'department_id'=>'nullable',
            'leader_id'=>'nullable',
            'businessEmail'=>'nullable',
            'hiredSince'=>'nullable',
            'contractedUntil'=>'nullable',
            'salary'=>'nullable',
            'contractFile'=>'nullable',
        ];
    }
}
