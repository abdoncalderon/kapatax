<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequestItem extends Model
{
    protected $fillable = ['purchase_request_id','need_request_item_id','reference','quantity','unity_id'];

    public function purchaseRequest()
    {
        return $this->belongsTo(PurchaseRequest::class);
    }

    public function needRequestItem()
    {
        return $this->belongsTo(NeedRequestItem::class);
    }

    public function unity()
    {
        return $this->belongsTo(Unity::class);
    }
}
