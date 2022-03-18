<?php

namespace App\Imports;

use App\Models\Turn;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class TurnsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Turn([
            'name' => $row[0],
            'start' => Carbon::createFromTimeString($row[1]),
            'finish' => Carbon::createFromTimeString($row[2]),
            'nextday' => $row[3],
            'project_id' => current_user()->project_id,
        ]);
    }
}
