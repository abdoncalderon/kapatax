<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name','code','taxId','city_id','address','zipCode','phoneNumber','subsidiary_id', 'startDate','finishDate', 'isActive', 'isLocked'];

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
