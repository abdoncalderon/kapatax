<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeedRequest extends Model
{
    protected $fillable = ['project_user_id','date','description','location_id','approving_user_id','cost_account_id','expectedCost','status_id',];

    public function projectUser(){
        return $this->belongsTo(ProjectUser::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function needRequestItems(){
        return $this->hasMany(NeedRequestItem::class);
    }

    public function approvingUser(){
        return $this->hasMany(ProjectUser::class,'approving_user_id','id');
    }

    public function status(){
        switch($this->status_id){
            case 0: return __('content.draft');
            case 1: return __('content.sent');
            case 2: return __('content.reviewed');
            case 3: return __('content.rejected');
            case 4: return __('content.processed');
            case 5: return __('content.dispatched');
            case 6: return __('content.received');
        }
    }
}
