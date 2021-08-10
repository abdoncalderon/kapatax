<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'code', 'ccc', 'region_id',];

    public function region(){
        return $this->belongsTo(Region::class);
    }
}
