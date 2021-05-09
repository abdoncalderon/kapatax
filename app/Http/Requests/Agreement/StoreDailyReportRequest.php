<?php

namespace App\Http\Requests;

use App\Models\DailyReport;
use Illuminate\Foundation\Http\FormRequest;

class StoreDailyReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $folio_id = $this->get('folio_id');
        $turn_id = $this->get('turn_id');
        $dailyReports = DailyReport::where('folio_id',$folio_id)->where('turn_id',$turn_id)->get();
        if (count($dailyReports)>0){
            return [
                'folio_id'=>'max:0',
            ];
        }else{
            return [
                'folio_id'=>'required',
                'turn_id'=>'required',
                'report'=>'required',
                'user_id'=>'required',
                'responsible'=>'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'folio_id.max' => __('messages.exists'),
        ];
    }
}
