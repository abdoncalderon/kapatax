<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['family_id','name','description',];

    public function family(){
        return $this->belongsTo(Family::class);
    }
}
