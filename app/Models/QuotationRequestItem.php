<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationRequestItem extends Model
{
    protected $fillable = ['quotation_request_id','need_request_item_id','reference','quantity','unity_id'];

    public function quotationRequest()
    {
        return $this->belongsTo(QuotationRequest::class);
    }

    public function unity()
    {
        return $this->belongsTo(Unity::class);
    }
}
