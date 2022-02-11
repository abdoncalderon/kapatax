<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funct1on extends Model
{
    protected $fillable = ['name','project_id',];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function positions(){
        return $this->hasMany(Position::class);
    }
}
