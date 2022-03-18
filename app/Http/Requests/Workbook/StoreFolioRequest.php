<?php

namespace App\Http\Requests\Workbook;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Folio;

class StoreFolioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $location_id = $this->get('location_id');
        $date = $this->get('date');
        $folios = Folio::where('location_id',$location_id)->where('date',$date)->get();
        if (count($folios)>0){
            return [
                'location_id'=>'max:0',
            ];
        }else{
            return [
                'date'=>'required',
                'location_id'=>'required',
                'project_user_id'=>'required',
                'number'=>'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'location_id.max' => __('messages.exists'),
        ];
    }
}
