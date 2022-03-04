<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = ['name', 'code', 'description', 'project_id', ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
