<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = ['name','project_id',];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function departments(){
        return $this->hasMany(Department::class);
    }
}
