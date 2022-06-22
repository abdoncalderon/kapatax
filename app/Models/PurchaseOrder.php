<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $fillable = ['quotation_id','sendDate','buyer_user_id','approver_id','status_id'];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    public function buyer()
    {
        return $this->belongsTo(ProjectUser::class,'buyer_user_id','id');
    }

    public function approver()
    {
        return $this->belongsTo(StakeholderPerson::class,'approver_id','id');
    }

    public function purchaseOrderItems(){
        return $this->hasMany(PurchaseOrderItem::class);
    }

    public function status(){
        switch($this->status_id){
            case 0: return __('content.draft');
            case 1: return __('messages.sentToApprove');
            case 2: return __('content.approved');
            case 3: return __('content.refused');
            case 4: return __('content.received');
            case 5: return __('content.canceled');
            case 6: return __('content.completed');
            case 7: return __('content.invoiced');
        }
    }

}
