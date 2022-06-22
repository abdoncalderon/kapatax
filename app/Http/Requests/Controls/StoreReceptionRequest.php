<?php

namespace App\Http\Requests\Controls;

use Illuminate\Foundation\Http\FormRequest;

class StoreReceptionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'purchase_order_id'=>'required|exists:purchase_orders,id',
            'type_id'=>'required',
            'documentNumber'=>'required',
            'file'=>'nullable',
            'receiver_user_id'=>'required',
            'warehouse_id'=>'required',
        ];
    }
}
