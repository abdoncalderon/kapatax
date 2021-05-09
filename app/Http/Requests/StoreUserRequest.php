<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string|max:255', 
            'user'=>'required|string|unique:users|max:30', 
            'email'=> 'required|string|email|unique:users|max:255',
            'role_id'=>'required',
            'password'=>'required|string|confirmed|min:8',
        ];
    }
}
