<?php

namespace App\Http\Requests\Workbook;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLocationProjectUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'dailyreport_collaborator'=>'nullable',
            'dailyreport_approver'=>'nullable',
            'folio_approver'=>'nullable',
            'receive_notification'=>'nullable',
        ];
    }
}
