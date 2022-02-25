<?php

namespace App\Imports;

use App\Models\Equipment;
use Maatwebsite\Excel\Concerns\ToModel;

class EquipmentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Equipment([
            'name' => $row[0],
            'project_id' => current_user()->project_id,
        ]);
    }
}
