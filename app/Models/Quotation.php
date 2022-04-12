<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = ['quotation_request_id','stakeholder_id','sendDate','answerDate','totalPrice','deliveryTime','project_user_id','quotationFile','status_id',];

    public function quotationRequest()
    {
        return $this->belongsTo(QuotationRequest::class);
    }

    public function stakeholder()
    {
        return $this->belongsTo(Stakeholder::class);
    }

    public function projectUser()
    {
        return $this->belongsTo(ProjectUser::class);
    }

    public function quotationItems(){
        return $this->hasMany(QuotationItem::class);
    }

    public function purchaseOrder(){
        return $this->hasOne(PurchaseOrder::class);
    }

    public function status(){
        switch($this->status_id){
            case 0: return __('content.pending');
            case 1: return __('content.accepted');
            case 2: return __('content.rejected');
        }
    }
}
