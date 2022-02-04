<?php

namespace App\Imports;

use App\Models\Country;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Region;

class CountriesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $region=Region::where('name',$row[3])->first();
        return new Country([
            'name' => $row[0],
            'code' => $row[2],
            'region_id' => $region->id,
            'ccc' => $row[4],
        ]);
    }
}
