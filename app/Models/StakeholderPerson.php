<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StakeholderPerson extends Model
{
    
    protected $fillable = ['stakeholder_id','person_id','admissionDate','departureDate', 'position_id', 'department_id','leader_id','businessEmail','hiredSince','contractedUntil','salary','contractFile','isApprover','isActive','isBlocked',];

    public function person(){
        return $this->belongsTo(Person::class);
    }

    public function stakeholder(){
        return $this->belongsTo(Stakeholder::class);
    }

    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function leader(){
        return $this->belongsTo(StakeholderPerson::class,'leader_id','id');
    }

    public function isActive(){
        if($this->isActive==1){
            return true;
        }else{
            return false;
        }
    }

    
    
}
