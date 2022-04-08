<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\MockObject\Rule\Parameters;

class Project extends Model
{
    protected $fillable = ['name','code','taxId','city_id','address','zipCode','phoneNumber','subsidiary_id', 'startDate','finishDate', 'isActive', 'isLocked','stakeholderLogo1_id','stakeholderLogo2_id','stakeholderLogo3_id','stakeholderLogo4_id',];

    public function subsidiary(){
        return $this->belongsTo(Subsidiary::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function locations(){
        return $this->hasMany(Location::class);
    }

    public function users(){
        return $this->hasMany(ProjectUser::class);
    }

    public function functions(){
        return $this->hasMany(Funct1on::class);
    }

    public function sectors(){
        return $this->hasMany(Sector::class);
    }

    public function stakeholders(){
        return $this->hasMany(Stakeholder::class);
    }

    public function families(){
        return $this->hasMany(Family::class);
    }

    public function projectRoles(){
        return $this->hasMany(ProjectRole::class);
    }

    public function projectUsers(){
        return $this->hasMany(ProjectUser::class);
    }

    public function parameter(){
        return $this->hasOne(Parameter::class);
    }

    public function zones(){
        return $this->hasMany(Zone::class);
    }

    public function equipments(){
        return $this->hasMany(Equipment::class);
    }

    public function turns(){
        return $this->hasMany(Turn::class);
    }

    public function isActive(){
        if($this->isActive==1){
            return true;
        }else{
            return false;
        }
    }

    public function isLocked(){
        if($this->isLocked==1){
            return true;
        }else{
            return false;
        }
    }
}
