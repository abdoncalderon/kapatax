<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    protected $fillable = ['name', 'code', 'taxId', 'country_id', 'address', 'zipCode', 'phoneNumber', 'company_id', 'isActive', 'blocked'];
}
