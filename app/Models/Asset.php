<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = ['name', 'description', 'asset_category_id', 'model_id', 'serialNumber', 'partNumber', 'internalCode', 'invoice_id', 'partOf','stock_movement_id',];

    public function assetCategory(){
        return $this->belongsTo(AssetCategory::class);
    }

    public function mode1(){
        return $this->belongsTo(Mode1::class);
    }

    public function invoice(){
        return $this->belongsTo(Mode1::class);
    }

    public function partOf(){
        return $this->belongsTo(Asset::class);
    }

    public function stockMovement(){
        return $this->belongsTo(Asset::class);
    }


}
