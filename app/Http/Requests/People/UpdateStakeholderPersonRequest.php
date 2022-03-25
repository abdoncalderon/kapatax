<?php

namespace App\Http\Requests\People;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStakeholderPersonRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'admissionDate'=>'required|date',
            'departureDate'=>'nullable|after:admissionDate',
            'position_id'=>'required',
            'department_id'=>'required',
        ];
    }
}
