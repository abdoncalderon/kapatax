<?php

namespace App\Http\Requests;

use App\Models\PositionDailyReport;

use Illuminate\Foundation\Http\FormRequest;

class StorePositionDailyReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $dailyReport_id = $this->get('daily_report_id');
        $contractor_id = $this->get('contractor_id');
        $position_id = $this->get('position_id');
        $positionDailyReports = PositionDailyReport::where('daily_report_id',$dailyReport_id)->where('contractor_id',$contractor_id)->where('position_id',$position_id)->get();
        if (count($positionDailyReports)>0){
            return [
                'daily_report_id'=>'max:0',
            ];
        }else{
            return [
                'daily_report_id'=>'required',
                'contractor_id'=>'required',
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
