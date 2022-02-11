<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'sector_id',];

    public function sector(){
        return $this->belongsTo(Sector::class);
    }
  
    public function employees(){
        return $this->hasMany(Employee::class);
    }

}
