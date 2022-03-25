<?php

namespace App\Imports;

use App\Models\Department;
use App\Models\Sector;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class DepartmentsImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    private $regions;

    public function __construct()
    {
        $this->sectors = Sector::pluck('id','name');
    }

    public function model(array $row)
    {
        return new Department([
            'name' => $row['name'],
            'sector_id' => $this->sectors[$row['sector_name']],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.name'=> ['unique:departments,name'],
            '*.sector_name'=> ['string'],
        ];
    }
}
