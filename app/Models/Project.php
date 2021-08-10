<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name','subsidiary_id'];

    public function locations(){
        return $this->hasMany(Location::class);
    }
}
