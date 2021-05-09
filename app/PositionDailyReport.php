<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionDailyReport extends Model
{
    // use HasFactory;

    protected $fillable = ['daily_report_id','contractor_id','position_id','quantity',];

    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    
}
