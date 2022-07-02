<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = ['project_id','asset_category_id', 'serialNumber', 'partNumber', 'internalCode', 'partOf','stock_movement_id','status_id',];

    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function assetCategory(){
        return $this->belongsTo(AssetCategory::class);
    }

    public function asset(){
        return $this->belongsTo(Asset::class,'partOf','id');
    }

    public function stockMovement(){
        return $this->belongsTo(Asset::class);
    }
    
    public function status(){
        return $this->belongsTo(Status::class);
    }
}
