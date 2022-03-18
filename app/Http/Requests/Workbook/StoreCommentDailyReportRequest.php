<?php

namespace App\Http\Requests\Workbook;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentDailyReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'daily_report_id'=>'required',
            'section'=>'required',
            'date'=>'required',
            'comment'=>'required',
            'project_user_id'=>'required',
        ];
    }
}
