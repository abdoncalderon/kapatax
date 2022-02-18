<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentDailyReport extends Model
{
    protected $fillable = ['daily_report_id','section','date','comment','user_id',];

    public function dailyReport()
    {
        return $this->belongsTo(DailyReport::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
