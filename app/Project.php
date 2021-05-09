<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // use HasFactory;

    protected $fillable = ['name','datestart','datefinish','logofilename1','logofilename2','logofilename3','logofilename4',];

    public function locations(){
        return $this->hasMany(Location::class);
    }

}
