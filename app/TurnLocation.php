<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurnLocation extends Model
{
    // use HasFactory;

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
