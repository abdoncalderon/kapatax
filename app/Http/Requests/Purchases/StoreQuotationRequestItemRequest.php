<?php

namespace App\Http\Requests\Purchases;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuotationRequestItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'quotation_request_id'=>'required',
            'material_id'=>'required',
            'quantity'=>'nullable',
            'unity_id'=>'required',
        ];
    }
}
