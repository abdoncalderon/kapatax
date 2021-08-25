<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class UpdateCityRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {   
        /* $name = $this->get('name');
        
        $state_id = $this->get('state_id');
        
        $states=DB::table('cities')->where([
            ['name','=',$name],
            ['state_id','=',$state_id],
            ])->get();

        if (count($states)<1){
            return [
                'state_id'=>'required',
            ];
        }else{
            return [
                'state_id'=>'size:0',
            ];
        } */
        return [
            'state_id'=>'required',
        ];
    }

    /* public function messages()
    {
        return [
            'state_id.size' => __('messages.exists'),
        */ ];
    }
}
