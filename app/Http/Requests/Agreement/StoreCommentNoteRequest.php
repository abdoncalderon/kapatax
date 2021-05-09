<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentNoteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'note_id'=>'required',
            'date'=>'required',
            'comment'=>'required',
            'user_id'=>'required',
        ];
    }
}
