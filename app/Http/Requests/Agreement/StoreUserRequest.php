<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|string|max:255', 
            'user'=>'required|string|unique:users|max:30', 
            'email'=> 'required|string|email|unique:users|max:255',
            'role_id'=>'required',
            'contractor_id'=>'required',
            'password'=>'required|string|confirmed|min:8',
        ];
    }
}
