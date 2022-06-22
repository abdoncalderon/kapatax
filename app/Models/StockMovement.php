<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $fillable = ['date', 'transactionType_id', 'need_request_item_id', 'material_id', 'quantity', 'unitPrice', 'balance', 'warehouse_id', 'project_user_id', 'receiver_id'];

    public function needRequestItem(){
        return $this->belongsTo(NeedRequestItem::class);
    }
    
    public function material(){
        return $this->belongsTo(Material::class);
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }

    public function projectUser(){
        return $this->belongsTo(ProjectUser::class);
    }

    public function receiver(){
        return $this->belongsTo(ProjectUser::class,'receiver_id','id');
    }

    public function transactionType(){
        switch($this->transactionType_id){
            case 1: return __('content.destocking');
            case 2: return __('content.purchase');
        }
    }

    
}
