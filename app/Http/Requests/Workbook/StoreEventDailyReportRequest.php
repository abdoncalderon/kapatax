<?php

namespace App\Http\Requests\Workbook;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventDailyReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'daily_report_id'=>'required',
            'cause'=>'required',
            'start'=>'required',
            'finish'=>'required',
            'description'=>'required',
            'project_user_id'=>'required',
        ];
    }
}
