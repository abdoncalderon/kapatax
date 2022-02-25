<?php

namespace App\Imports;

use App\Models\Funct1on;
use Maatwebsite\Excel\Concerns\ToModel;

class FunctionsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Funct1on([
            'name' => $row[0],
            'project_id' => current_user()->project_id,
        ]);
    }
}
