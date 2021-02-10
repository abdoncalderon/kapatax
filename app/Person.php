<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['cardId', 'fullname', 'firstName', 'lastName', 'gender', 'birthDate', 'email', 'jobTitle', 'city_id', 'address', 'homePhone', 'mobilePhone', 'photo', 'signature', 'active', 'blocked', ];
}
