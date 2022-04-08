<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $fillable = ['transactionType_id','need_request_id', 'material_id','quantity','warehouse_id','project_user_id', 'receiver_id'];

    public function needRequest(){
        return $this->belongsTo(NeedRequest::class);
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
