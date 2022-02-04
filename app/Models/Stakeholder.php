<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stakeholder extends Model
{
    protected $fillable = ['name','project_id','code','taxId','city_id','address','zipCode','phoneNumber','logoFile','stakeholder_types_id',];

    public function project(){
        return $this->belongsTo(State::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function stakeholder_type(){
        return $this->belongsTo(StakeholderType::class);
    }
}
