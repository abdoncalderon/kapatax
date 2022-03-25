<?php

namespace App\Imports;

use App\Models\Position;
use App\Models\Funct1on;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PositionsImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    private $functions;

    public function __construct()
    {
        $this->functions = Funct1on::pluck('id','name');
    }

    public function model(array $row)
    {
        return new Position([
            'name' => $row['name'],
            'function_id' => $this->functions[$row['function_name']],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.name'=> ['string'],
            '*.function_name'=> ['string'],
        ];
    }
}
