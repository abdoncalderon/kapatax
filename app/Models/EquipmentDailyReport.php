<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentDailyReport extends Model
{
    protected $fillable = ['daily_report_id','stakeholder_id','equipment_id','quantity',];

    public function stakeholder()
    {
        return $this->belongsTo(Stakeholder::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
