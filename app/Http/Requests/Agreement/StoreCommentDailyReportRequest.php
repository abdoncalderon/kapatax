<?php

namespace App\Http\Requests;

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
            'user_id'=>'required',
        ];
    }
}
