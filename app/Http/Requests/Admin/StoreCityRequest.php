<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class StoreCityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        /* $name = $this->get('name');
        
        $state_id = $this->get('state_id');
        
        $cities=DB::table('cities')->where([
            ['name','=',$name],
            ['state_id','=',$state_id],
            ])->get();

        if (count($cities)<1){
            return [
                'name'=>'required',
                'state_id'=>'required',
            ];
        }else{
            return [
                'name'=>'max:0',
                'state_id'=>'size:0',
            ];
        } */
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
