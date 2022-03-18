<?php

namespace App\Http\Requests\Settings;

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
            'user'=>'required|string|unique:users|max:30', 
            'email'=> 'required|string|email|unique:users|max:255',
            'password'=>'required|string|confirmed|min:8',
        ];
    }
}
