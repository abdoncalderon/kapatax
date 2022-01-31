<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleMenu extends Model
{
    protected $fillable = ['menu_id','role_id',];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isActive(){
        if($this->isActive==1){
            return true;
        }else{
            return false;
        }
    }
}
