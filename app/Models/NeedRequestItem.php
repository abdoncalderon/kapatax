<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeedRequestItem extends Model
{
    protected $fillable = ['need_request_id','reference','quantity','unity_id','status_id', 'class_id'];

    public function needRequest(){
        return $this->belongsTo(NeedRequest::class);
    }

    public function unity(){
        return $this->belongsTo(Unity::class);
    }

    public function status(){
        switch($this->status_id){
            case 0: return __('content.draft');
            case 1: return __('content.sent');
            case 2: return __('content.rejected');
            case 3: return __('content.approved');
            case 4: return __('content.processed');
            case 5: return __('content.delivered');
        }
    }

    public function class(){
        switch($this->class_id){
            case 0: return __('content.purchase');
            case 1: return __('content.destocking');
        }
    }
}
