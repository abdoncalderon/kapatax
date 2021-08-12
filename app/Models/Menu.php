<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['code', 'menu_id', 'showName', 'route', 'icon', 'isActive',];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    public function roles()
    {
        return $this->hasMany(RoleMenu::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function isActive(){
        if($this->isActive==1){
            return true;
        }else{
            return false;
        }
    }
}
