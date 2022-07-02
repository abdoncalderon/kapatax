<?php

namespace App\Http\Requests\Session;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNeedRequestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'description'=>'required',
            'date'=>'required',
            'applicant_id'=>'required',
            'location_id'=>'required',
            'approver_id'=>'nullable',
            'cost_account_id'=>'nullable',
            'expectedCost'=>'nullable',
            'status_id'=>'required',
        ];
    }
}
