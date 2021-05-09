<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttachmentDailyReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'daily_report_id'=>'required',
            'image'=>'required',
            'user_id'=>'required',
        ];
    }
}
