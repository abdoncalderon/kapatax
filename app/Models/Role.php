<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'isActive',];

    public function menus()
    {
        return $this->hasMany(RoleMenu::class);
    }

    public function isActive(){
        if($this->isActive==1){
            return true;
        }else{
            return false;
        }
    }
}
