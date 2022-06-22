<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['name','project_id',];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
