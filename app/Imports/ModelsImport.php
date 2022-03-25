<?php

namespace App\Imports;

use App\Models\Mode1;
use App\Models\Brand;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ModelsImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    private $brands;

    public function __construct()
    {
        $this->brands = Brand::pluck('id','name');
    }

    public function model(array $row)
    {
        return new Mode1([
            'name' => $row['name'],
            'brand_id' => $this->brands[$row['brand_name']],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.name'=> ['string'],
            '*.brand_name'=> ['string'],
        ];
    }
}
