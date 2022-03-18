<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventDailyReport extends Model
{
    protected $fillable = ['daily_report_id','cause','start','finish','description','haveImpact','project_user_id',];

    public function projectUser()
    {
        return $this->belongsTo(ProjectUser::class);
    }

    public function haveImpact(){
        if($this->haveImpact==0){
            return __('content.no');
        }else{
            return __('content.yes');
        }
    }
}
