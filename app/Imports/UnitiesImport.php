<?php

namespace App\Imports;

use App\Models\Unity;
use Maatwebsite\Excel\Concerns\ToModel;

class UnitiesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Unity([
            'name' => $row[0],
            'code' => $row[1],
        ]);
    }
}
