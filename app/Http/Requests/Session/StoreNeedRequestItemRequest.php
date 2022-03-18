<?php

namespace App\Http\Requests\Session;

use Illuminate\Foundation\Http\FormRequest;

class StoreNeedRequestItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'need_request_id'=>'required',
            'reference'=>'required',
            'quantity'=>'required',
            'unity_id'=>'required',
            'status_id'=>'required',
        ];
    }
}
