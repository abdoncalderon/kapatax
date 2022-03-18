<?php

namespace App\Http\Requests\Workbook;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFolioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'number'=>'required',
        ];
    }
}
