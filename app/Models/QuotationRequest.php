<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationRequest extends Model
{
    protected $fillable = ['need_request_id','project_user_id','date','status_id'];

    public function needRequest()
    {
        return $this->belongsTo(NeedRequest::class);
    }

    public function projectUser()
    {
        return $this->belongsTo(ProjectUser::class);
    }

    public function quotationRequestItems(){
        return $this->hasMany(QuotationRequestItem::class);
    }

    public function quotationRequestNotifications(){
        return $this->hasMany(QuotationRequestNotification::class);
    }

    public function status(){
        switch($this->status_id){
            case 0: return __('content.pending');
            case 1: return __('content.sent');
        }
    }
}
