<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany(ProjectFunction::class);
    }

    public function sectors(){
        return $this->hasMany(ProjectSector::class);
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
