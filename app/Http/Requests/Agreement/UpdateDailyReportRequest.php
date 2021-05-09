<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDailyReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'report'=>'required',
            'user_id'=>'required',
            'status'=>'required',
            'reviewedby'=>'required',
            'approvedby'=>'required',
        ];
    }
}
