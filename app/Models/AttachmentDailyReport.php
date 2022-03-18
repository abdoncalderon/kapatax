<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttachmentDailyReport extends Model
{
    protected $fillable = ['daily_report_id','filename','description','project_user_id',];

    public function projectUser()
    {
        return $this->belongsTo(ProjectUser::class);
    }

    public function dailyReport()
    {
        return $this->belongsTo(DailyReport::class);
    }
}
