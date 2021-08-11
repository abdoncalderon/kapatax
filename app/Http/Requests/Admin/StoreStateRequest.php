<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class StoreStateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $name = $this->get('name');
        
        $country_id = $this->get('country_id');
        
        $states=DB::table('states')->where([
            ['name','=',$name],
            ['country_id','=',$country_id],
            ])->get();

        if (count($states)<1){
            return [
                'name'=>'required',
                'country_id'=>'required',
            ];
        }else{
            return [
                'name'=>'max:0',
                'country_id'=>'size:0',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.max' => __('messages.exists'),
            'country_id.size' => __('messages.exists'),
        ];
    }
}
