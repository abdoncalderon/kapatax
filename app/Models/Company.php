<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name','code', 'isActive', 'isLocked'];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function isActive(){
        if($this->isActive==1){
            return true;
        }else{
            return false;
        }
    }

    public function isLocked(){
        if($this->isLocked==1){
            return true;
        }else{
            return false;
        }
    }
}
