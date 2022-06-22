<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceptionItem extends Model
{
    protected $fillable = ['reception_id','purchase_order_item_id','date','quantity'];

    public function reception()
    {
        return $this->belongsTo(Reception::class);
    }
    
    public function purchaseOrderItem()
    {
        return $this->belongsTo(PurchaseOrderItem::class);
    }
}
