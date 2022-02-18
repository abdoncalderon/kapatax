<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetAccount extends Model
{
    protected $fillable = ['asset_group_id','assetAccount','accumulateDepreciationAccount','depreciationAccount','disposalRevenewAccount','disposalLostAccount',];

    public function assetGroup(){
        return $this->belongsTo(AssetGroup::class);
    }
}
