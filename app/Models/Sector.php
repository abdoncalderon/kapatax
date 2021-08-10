<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = ['name', 'subsidiary_id', 'location', 'latitude', 'longitude',];
}
