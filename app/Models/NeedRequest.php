<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeedRequest extends Model
{
    protected $fillable = ['applicant_id','date','description','location_id','approver_id','cost_account_id','expectedCost','status_id',];

    public function applicant(){
        return $this->belongsTo(ProjectUser::class,'applicant_id','id');
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function needRequestItems(){
        return $this->hasMany(NeedRequestItem::class);
    }

    public function approver(){
        return $this->belongsTo(StakeholderPerson::class,'approver_id','id');
    }

    public function purchaseRequest(){
        return $this->hasOne(PurchaseRequest::class);
    }

    public function status(){
        switch($this->status_id){
            case 0: return __('content.draft');
            case 1: return __('messages.sentToApprove');
            case 2: return __('content.rejected');
            case 3: return __('content.approved');
            case 4: return __('messages.inProcess');
            case 5: return __('content.complete');
        }
    }
}

