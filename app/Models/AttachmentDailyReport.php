<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttachmentDailyReport extends Model
{
    protected $fillable = ['daily_report_id','filename','description','user_id',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dailyReport()
    {
        return $this->belongsTo(DailyReport::class);
    }
}
