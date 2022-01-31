<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'project_sector_id',];

    public function project_sector(){
        return $this->belongsTo(ProjectSector::class);
    }

    public function positions(){
        return $this->hasMany(Position::class);
    }
}
