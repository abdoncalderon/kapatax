<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name','code', 'taxId', 'city_id', 'address', 'zipCode', 'phoneNumber', 'active', 'blocked'];
}
