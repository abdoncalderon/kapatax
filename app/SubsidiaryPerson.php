<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubsidiaryPerson extends Model
{
    protected $fillable = ['person_id', 'subsidiary_id', 'company_id', 'jobId', 'position_id', 'department_id', 'leader', 'contractFrom', 'contractTo', ];
}
