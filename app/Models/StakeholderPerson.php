<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StakeholderPerson extends Model
{
    
    protected $fillable = ['stakeholder_id','person_id','admissionDate','departureDate','isActive',];

    public function person(){
        return $this->belongsTo(Person::class);
    }

    public function stakeholder(){
        return $this->belongsTo(Stakeholder::class);
    }
    
}
