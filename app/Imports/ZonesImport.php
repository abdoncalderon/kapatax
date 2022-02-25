<?php

namespace App\Imports;

use App\Models\Zone;
use Maatwebsite\Excel\Concerns\ToModel;

class ZonesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Zone([
            'name' => $row[0],
            'project_id' => current_user()->project_id,
        ]);
    }
}
