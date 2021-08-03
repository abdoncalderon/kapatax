<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    // protected $fillable = ['name', 'isActive',];

    protected $fillable = ['name', ];

    /* public function users(){
        return $this->hasMany(User::class);
    } */

    /* public function isActive(){
        if($this->isActive==1){
            return true;
        }else{
            return false;
        }
    } */

    
}
