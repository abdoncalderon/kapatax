<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermit extends Model
{
    protected $fillable = ['role_id','permit_id','isActive',];

    public function role(){
        return $this->belongsTo(User::class);
    }

    public function permit(){
        return $this->belongsTo(Permit::class);
    }

    public function isActive(){
        if($this->isActive==1){
            return true;
        }else{
            return false;
        }
    }
}
