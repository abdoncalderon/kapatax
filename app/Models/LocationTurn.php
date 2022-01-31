<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationTurn extends Model
{
    protected $fillable = ['turn_id','location_id','dateFrom','dateTo',];

    public function turn()
    {
        return $this->belongsTo(Turn::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
