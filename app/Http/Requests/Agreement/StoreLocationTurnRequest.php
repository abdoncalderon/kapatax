<?php

namespace App\Http\Requests\Agreement;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationTurnRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'turn_id'=>'required',
            'location_id'=>'required',
            'dateFrom'=>'required',
            'dateTo'=>'required',
        ];
    }
}
