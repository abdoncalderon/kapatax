<?php

namespace App\Http\Requests\Agreement;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\PositionDailyReport;

class StorePositionDailyReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $dailyReport_id = $this->get('daily_report_id');
        $stakeholder_id = $this->get('stakeholder_id');
        $position_id = $this->get('position_id');
        $positionDailyReports = PositionDailyReport::where('daily_report_id',$dailyReport_id)->where('stakeholder_id',$stakeholder_id)->where('position_id',$position_id)->get();
        if (count($positionDailyReports)>0){
            return [
                'daily_report_id'=>'max:0',
            ];
        }else{
            return [
                'daily_report_id'=>'required',
                'stakeholder_id'=>'required',
                'position_id'=>'required',
                'quantity'=>'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'daily_report_id.max' => __('messages.exists'),
        ];
    }
}
