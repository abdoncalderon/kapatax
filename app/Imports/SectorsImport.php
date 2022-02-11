<?php

namespace App\Imports;

use App\Models\Sector;
use App\Models\Project;
use Maatwebsite\Excel\Concerns\ToModel;

class SectorsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sector([
            'name' => $row[0],
            'project_id' => current_user()->project_id,
        ]);
    }
}
