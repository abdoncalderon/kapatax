<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required',
            'code'=>'required',
            'taxId'=>'required',
            'city_id'=>'required',
            'address'=>'required',
            'zipCode'=>'nullable',
            'phoneNumber'=>'required',
            'subsidiary_id'=>'required',
            'startDate'=>'required|date',
            'finishDate'=>'required|date',

        ];
    }
}
