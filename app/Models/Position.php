<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['name','function_id',];

    public function function(){
        return $this->belongsTo(Funct1on::class);
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
