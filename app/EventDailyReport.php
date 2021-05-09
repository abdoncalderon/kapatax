<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDailyReport extends Model
{
    // use HasFactory;

    protected $fillable = ['daily_report_id','cause','start','finish','description','haveImpact','user_id',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function haveImpact(){
        if($this->haveImpact==0){
            return __('content.no');
        }else{
            return __('content.yes');
        }
    }
}
