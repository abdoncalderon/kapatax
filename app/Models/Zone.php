<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = ['name', 'project_id',];

    public function project(){
        return $this->belongsTo(State::class);
    }
}
