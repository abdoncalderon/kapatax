<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // use HasFactory;

    protected $fillable = ['name','subsidiary_id'];

    public function locations(){
        return $this->hasMany(Location::class);
    }

}
