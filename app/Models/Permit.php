<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    protected $fillable = ['name','menu_id',];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    
}
