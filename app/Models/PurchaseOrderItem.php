<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    protected $fillable = ['purchase_order_id','quotation_item_id','description','quantity','consumptionAvailable','unity_id','unitPrice','deliveryDate','status_id','material_id'];

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function quotationItem()
    {
        return $this->belongsTo(QuotationItem::class);
    }

    public function unity()
    {
        return $this->belongsTo(Unity::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function status(){
        switch($this->status_id){
            case 0: return __('content.pending');
            case 1: return __('content.dispatched');
            case 2: return __('content.delivered');
        }
    }
}
