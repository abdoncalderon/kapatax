<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['cardId', 'fullName', 'firstName', 'lastName', 'gender_id', 'birthDate', 'email', 'jobTitle', 'city_id', 'address', 'homePhone', 'mobilePhone', 'photo', 'project_user_id','isActive', 'blocked', ];

       
    public function city(){
        return $this->belongsTo(City::class);
    }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function projectUser(){
        return $this->belongsTo(ProjectUser::class);
    }

    public function stakeholderPeople(){
        return $this->hasMany(StakeholderPerson::class);
    }
}
