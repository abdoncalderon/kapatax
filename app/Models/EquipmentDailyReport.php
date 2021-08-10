<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentDailyReport extends Model
{
    protected $fillable = ['daily_report_id','contractor_id','equipment_id','quantity',];

    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
