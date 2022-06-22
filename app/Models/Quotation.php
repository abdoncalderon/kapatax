<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = ['quotation_request_id','answerDate','totalPrice','seller_user_id','quotationFile','observations','status_id',];

    public function quotationRequest()
    {
        return $this->belongsTo(QuotationRequest::class);
    }

    public function seller()
    {
        return $this->belongsTo(ProjectUser::class,'seller_user_id','id');
    }

    public function quotationItems(){
        return $this->hasMany(QuotationItem::class);
    }

    public function quotationAttachments(){
        return $this->hasMany(QuotationAttachment::class);
    }

    public function purchaseOrder(){
        return $this->hasOne(PurchaseOrder::class);
    }

    public function status(){
        switch($this->status_id){
            case 0: return __('content.pending');
            case 1: return __('content.accepted');
            case 2: return __('content.rejected');
            case 3: return __('content.answered');
            case 4: return __('content.reviewed');
            case 5: return __('content.approved');
            case 6: return __('content.discarded');

        }
    }
}
