<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationRequestItem extends Model
{
    protected $fillable = ['quotation_request_id','need_request_item_id','reference','quantity','unity_id','status_id'];

    public function quotationRequest()
    {
        return $this->belongsTo(QuotationRequest::class);
    }

    public function unity()
    {
        return $this->belongsTo(Unity::class);
    }

    public function status(){
        switch($this->status_id){
            case 0: return __('content.pending');
            case 1: return __('content.accepted');
            case 2: return __('content.rejected');
            case 3: return __('content.quoted');
        }
    }
}
