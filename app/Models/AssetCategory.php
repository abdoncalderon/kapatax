<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetCategory extends Model
{
    protected $fillable = ['asset_group_id','name','code','description','asset_type_id','isActive',];

    public function assetGroup(){
        return $this->belongsTo(AssetGroup::class);
    }

    public function assetType(){
        return $this->belongsTo(AssetType::class);
    }

    public function isActive(){
        if($this->isActive==1){
            return true;
        }else{
            return false;
        }
    }
}
