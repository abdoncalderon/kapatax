<?php

namespace App\Http\Requests\Agreement;

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
            'user_id'=>'required',
        ];
    }
}
