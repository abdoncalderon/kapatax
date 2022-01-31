<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    protected $fillable = ['name','project_id','code','taxId','address','zipCode','phoneNumber',];

    public function project(){
        return $this->belongsTo(State::class);
    }
}

