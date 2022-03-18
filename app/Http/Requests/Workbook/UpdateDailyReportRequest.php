<?php

namespace App\Http\Requests\Workbook;

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
            'project_user_id'=>'required',
            'status'=>'required',
            'reviewedby'=>'required',
            'approvedby'=>'required',
        ];
    }
}
