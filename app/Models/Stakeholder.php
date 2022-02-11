<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stakeholder extends Model
{
    protected $fillable = ['name','project_id','code','taxId','city_id','address','zipCode','email','phoneNumber','logoFile','stakeholder_type_id',];

    public function project(){
        return $this->belongsTo(State::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function stakeholderType(){
        return $this->belongsTo(StakeholderType::class);
    }

    
}
