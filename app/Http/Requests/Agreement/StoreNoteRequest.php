<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'folio_id'=>'required',
            'turn_id'=>'required',
            'date'=>'required',
            'note'=>'required',
            'user_id'=>'required',
        ];
    }
}
