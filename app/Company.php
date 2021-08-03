<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name','code', 'isActive', 'blocked'];

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

    public function isBlocked(){
        if($this->blocked==1){
            return true;
        }else{
            return false;
        }
    }
}
