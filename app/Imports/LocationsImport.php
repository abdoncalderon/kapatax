<?php

namespace App\Imports;

use App\Models\Location;
use App\Models\Zone;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class LocationsImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    private $zones;

    public function __construct()
    {
        $this->zones = Zone::pluck('id','name');
    }
    public function model(array $row)
    {
        return new Location([
            'name' => $row['name'],
            'code' => $row['code'],
            'zone_id' => $this->zones[$row['zone_name']],
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude'],
            'sequence' => $row['sequence'],
            'startDate' => $row['startDate'],
            'finishDate' => $row['finishDate'],
            'max_time_open_folio' => $row['max_time_open_folio'],
            'max_time_create_dailyReport' => $row['max_time_create_daily_report'],
            'max_time_create_note' => $row['max_time_create_note'],
            'max_time_create_comment' => $row['max_time_create_comment'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.name'=> ['string'],
            '*.code'=> ['string'],
            '*.latitude'=> ['numeric'],
            '*.longitude'=> ['numeric'],
            '*.sequence'=> ['integer'],
            '*.startDate'=> ['date'],
            '*.finishDate'=> ['date'],
            '*.max_time_open_folio'=>['integer'],
            '*.max_time_create_dailyreport'=>['integer'],
            '*.max_time_create_note'=>['integer'],
            '*.max_time_create_comment'=>['integer'],
            '*.zone_name'=> ['string'],
        ];
    }
}
