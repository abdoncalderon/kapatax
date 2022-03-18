<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['stakeholder_person_id','department_id', 'position_id', 'leader_id', 'businessEmail', 'hiredSince', 'contractedUntil',  'salary', 'admissionDate','departureDate', 'contractFile','isActive',];

    public function stakeholderPerson(){
        return $this->belongsTo(StakeholderPerson::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function leader(){
        return $this->belongsTo(Employee::class);
    }

    public function isActive(){
        if($this->isActive==1){
            return true;
        }else{
            return false;
        }
    }
}
