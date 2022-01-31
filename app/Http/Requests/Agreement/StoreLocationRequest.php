<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name'=>'required|unique:locations',
            'code'=>'required|unique:locations',
            'zone_id'=>'required',
            'sequence'=>'required',
            'latitude'=>'nullable',
            'longitude'=>'nullable',
            'startDate'=>'required',
            'finishDate'=>'required',
            'max_time_open_folio'=>'required',
            'max_time_create_dailyreport'=>'required',
            'max_time_create_note'=>'required',
            'max_time_create_comment'=>'required',
        ];
    }
}
