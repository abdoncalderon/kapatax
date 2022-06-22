<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    protected $fillable = ['purchase_order_id','warehouse_id','date','type_id','documentNumber','digitalFile','receiver_user_id','status_id'];
    
    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function receiver()
    {
        return $this->belongsTo(ProjectUser::class,'receiver_user_id','id');
    }

    public function receptionItems(){
        return $this->hasMany(ReceptionItem::class);
    }

    public function type(){
        switch($this->status_id){
            case 0: return __('content.referralGuide');
            case 1: return __('content.worksheet');
        }
    }

    public function status(){
        switch($this->status_id){
            case 0: return __('content.open');
            case 1: return __('content.closed');
        }
    }
}
