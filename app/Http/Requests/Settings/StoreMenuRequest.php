<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
   
    public function rules()
    {
        return [
            'code'=>'required|unique:menus,code',
            'showName'=>'required',
            'route'=>'',
            'menu_id'=>'',
            'icon'=>'',
        ];
    }
}
