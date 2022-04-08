<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class DestockingRequestItem extends Model
{
    protected $fillable = ['destocking_request_id','need_request_item_id','reference','quantity','unity_id'];

    public function destockingRequest(){
        return $this->belongsTo(DestockingRequest::class);
    }

    public function unity(){
        return $this->belongsTo(Unity::class);
    }
}
