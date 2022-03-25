<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Family;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CategoriesImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    private $families;

    public function __construct()
    {
        $this->families = Family::pluck('id','name');
    }

    public function model(array $row)
    {
        return new Category([
            'name' => $row['name'],
            'code' => $row['code'],
            'description' => $row['description'],
            'family_id' => $this->families[$row['family_name']],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.name'=> ['string'],
            '*.code'=> ['string'],
            '*.family_name'=> ['string'],
        ];
    }
}
