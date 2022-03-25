<?php

namespace App\Imports;

use App\Models\Family;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FamiliesImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new Family([
            'name' => $row['name'],
            'code' => $row['code'],
            'project_id' => current_user()->project_id,
        ]);
    }

    public function rules(): array
    {
        return [
            '*.name'=> ['string'],
            '*.code'=> ['string'],
        ];
    }
}
