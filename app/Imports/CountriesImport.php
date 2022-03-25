<?php

namespace App\Imports;

use App\Models\Country;
use App\Models\Region;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CountriesImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    private $regions;

    public function __construct()
    {
        $this->regions = Region::pluck('id','name');
    }

    public function model(array $row)
    {
        return new Country([
            'name' => $row['name'],
            'code' => $row['code'],
            'region_id' => $this->regions[$row['region_name']],
            'ccc' => $row['ccc'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.name'=> ['unique:countries,name'],
            '*.code'=> ['unique:countries,code'],
            '*.region_name'=> ['string'],
        ];
    }
}
