<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentDailyReport extends Model
{
    protected $fillable = ['daily_report_id','section','date','comment','project_user_id',];

    public function dailyReport()
    {
        return $this->belongsTo(DailyReport::class);
    }

    public function projectUser()
    {
        return $this->belongsTo(ProjectUser::class);
    }
}
