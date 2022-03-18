<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetStatusUpdate extends Model
{
    protected $fillable = ['asset_id','date','oldStatus','newStatus','registeredBy','backupDocument','comments',];

    public function asset(){
        return $this->belongsTo(Asset::class);
    }

    public function registerUser(){
        return $this->belongsTo(ProjectUser::class,'registeredBy','id');
    }

    public function newStatus(){
        return $this->belongsTo(Status::class,'newStatus','id');
    }

    public function oldStatus(){
        return $this->belongsTo(Status::class,'oldStatus','id');
    }
}
