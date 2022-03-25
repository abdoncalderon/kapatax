<?php

namespace App\Imports;

use App\Models\State;
use App\Models\Country;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StatesImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    private $countries;

    public function __construct()
    {
        $this->countries = Country::pluck('id','name');
    }

    public function model(array $row)
    {
        return new State([
            'name' => $row['name'],
            'country_id' => $this->countries[$row['country_name']],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.name'=> ['string'],
            '*.country_name'=> ['string'],
        ];
    }
}
