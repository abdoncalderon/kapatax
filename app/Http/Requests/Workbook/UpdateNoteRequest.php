<?php

namespace App\Http\Requests\Workbook;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'note'=>'required',
            'status'=>'required',
        ];
    }
}
