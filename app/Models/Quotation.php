<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = ['quotation_request_id','stakeholder_id','date','project_user_id','status_id','quotationFile'];

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
}
