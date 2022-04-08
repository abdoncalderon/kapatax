<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestockingRequest extends Model
{
    protected $fillable = ['need_request_id','project_user_id','date'];

    public function needRequest(){
        return $this->belongsTo(NeedRequest::class);
    }

    public function projectUser(){
        return $this->belongsTo(ProjectUser::class);
    }

    public function destockingRequestItems(){
        return $this->hasMany(destockingRequestItem::class);
    }

    public function status(){
        switch($this->status_id){
            case 0: return __('content.pending');
            case 1: return __('content.delivered');
        }
    }
}
