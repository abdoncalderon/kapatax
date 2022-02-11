<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;


class StoreCityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required',
            'state_id'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.max' => __('messages.exists'),
            'state_id.size' => __('messages.exists'),
        ];
    }
}
