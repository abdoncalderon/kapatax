<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PositionDailyReport extends Model
{
    protected $fillable = ['daily_report_id','stakeholder_id','position_id','quantity',];

    public function stakeholder()
    {
        return $this->belongsTo(Stakeholder::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
