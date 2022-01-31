<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectFunction extends Model
{
    protected $fillable = ['project_id','funct1on_id',];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function funct1on(){
        return $this->belongsTo(Funct1on::class);
    }
}
