<?php

namespace App\Http\Requests;

use App\Models\EquipmentDailyReport;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipmentDailyReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $dailyReport_id = $this->get('daily_report_id');
        $contractor_id = $this->get('contractor_id');
        $equipment_id = $this->get('equipment_id');
        $equipmentDailyReports = EquipmentDailyReport::where('daily_report_id',$dailyReport_id)->where('contractor_id',$contractor_id)->where('equipment_id',$equipment_id)->get();
        if (count($equipmentDailyReports)>0){
            return [
                'daily_report_id'=>'max:0',
            ];
        }else{
            return [
                'daily_report_id'=>'required',
                'contractor_id'=>'required',
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
