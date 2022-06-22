<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequestNotification extends Model
{
    protected $fillable = ['purchase_request_id','stakeholder_id','status_id'];

    public function purchaseRequest()
    {
        return $this->belongsTo(PurchaseRequest::class);
    }

    public function stakeholder()
    {
        return $this->belongsTo(Stakeholder::class);
    }

    public function status(){
        switch($this->status_id){
            case 0: return __('content.added');
            case 1: return __('content.sent');
            case 2: return __('content.rejected');
            case 3: return __('content.accepted');
        }
    }
}
