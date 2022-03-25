<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLocationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required',
            'zone_id'=>'required',
            'code'=>'required',
            'sequence'=>'required',
            'latitude'=>'nullable',
            'longitude'=>'nullable',
            'startDate'=>'required',
            'finishDate'=>'required|after:startDat',
            'max_time_open_folio'=>'required',
            'max_time_create_dailyreport'=>'required',
            'max_time_create_note'=>'required',
            'max_time_create_comment'=>'required',
        ];
    }
}
