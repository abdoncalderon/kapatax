<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code'=>'required',
            'showName'=>'required',
            'route'=>'',
            'menu_id'=>'',
            'icon'=>'',
        ];
    }
}
