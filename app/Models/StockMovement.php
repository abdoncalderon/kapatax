<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    protected $fillable = ['transactionType','transactionReference_id', 'material_id','quantity','warehouse_id','project_user_id'];

    public function material(){
        return $this->belongsTo(Material::class);
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }

    public function projectUser(){
        return $this->belongsTo(ProjectUser::class);
    }
}
