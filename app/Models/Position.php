<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['name','project_function_id','department_id',];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function project_function(){
        return $this->belongsTo(ProjectFunction::class);
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
