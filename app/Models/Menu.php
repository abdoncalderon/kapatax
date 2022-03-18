<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['code','father', 'showName', 'route', 'icon', 'isActive',];

    public function menu(){
        return $this->belongsTo(Menu::class,'father','code');
    }

    public function roleMenus()
    {
        return $this->hasMany(RoleMenu::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class,'father','code');
    }

    public function isActive(){
        if($this->isActive==1){
            return true;
        }else{
            return false;
        }
    }
}
