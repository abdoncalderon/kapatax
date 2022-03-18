<?php

namespace App\Http\Requests\Workbook;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttachmentNoteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'note_id'=>'required',
            'image'=>'required',
        ];
    }
}
