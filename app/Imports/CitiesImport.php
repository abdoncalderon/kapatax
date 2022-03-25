<?php

namespace App\Imports;

use App\Models\City;
use App\Models\State;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CitiesImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    private $states;

    public function __construct()
    {
        $this->states = State::pluck('id','name');
    }

    public function model(array $row)
    {
        return new City([
            'name' => $row['name'],
            'state_id' => $this->states[$row['state_name']],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.name'=> ['string'],
            '*.state_name'=> ['string'],
        ];
    }
}
