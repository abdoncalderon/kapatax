<?php

namespace App\Http\Requests\Agreement;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\EquipmentDailyReport;

class StoreEquipmentDailyReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $dailyReport_id = $this->get('daily_report_id');
        $stakeholder_id = $this->get('stakeholder_id');
        $equipment_id = $this->get('equipment_id');
        $equipmentDailyReports = EquipmentDailyReport::where('daily_report_id',$dailyReport_id)->where('stakeholder_id',$stakeholder_id)->where('equipment_id',$equipment_id)->get();
        if (count($equipmentDailyReports)>0){
            return [
                'daily_report_id'=>'max:0',
            ];
        }else{
            return [
                'daily_report_id'=>'required',
                'stakeholder_id'=>'required',
                'equipment_id'=>'required',
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
