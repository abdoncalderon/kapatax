<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name','subsidiary_id'];

    public function subsidiary(){
        return $this->belongsTo(Subsidiary::class);
    }

    public function locations(){
        return $this->hasMany(Location::class);
    }

    public function users(){
        return $this->hasMany(ProjectUser::class);
    }
}
