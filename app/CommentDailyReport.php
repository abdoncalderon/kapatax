<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentDailyReport extends Model
{
    // use HasFactory;

    protected $fillable = ['daily_report_id','section','date','comment','user_id',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dailyReport()
    {
        return $this->belongsTo(DailyReport::class);
    }

    
}
