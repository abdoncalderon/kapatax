<?php

namespace App\Http\Requests\People;

use Illuminate\Foundation\Http\FormRequest;

class StoreStakeholderPersonRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'stakeholder_id'=>'required',
            'person_id'=>'required',
            'admissionDate'=>'required',
        ];
    }
}
