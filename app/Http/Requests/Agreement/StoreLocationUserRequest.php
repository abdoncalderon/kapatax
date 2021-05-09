<?php

namespace App\Http\Requests;

use App\Models\LocationUser;
use Illuminate\Foundation\Http\FormRequest;

class StoreLocationUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $location_id = $this->get('location_id');
        $user_id = $this->get('user_id');
        $locationsUsers = LocationUser::where('location_id',$location_id)->where('user_id',$user_id)->get();
        if (count($locationsUsers)>0){
            return [
                'location_id'=>'max:0',
            ];
        }else{
            return [
                'location_id'=>'required',
                'user_id'=>'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'location_id.max' => __('messages.exists'),
        ];
    }
}
