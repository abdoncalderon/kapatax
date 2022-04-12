<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{
    protected $fillable = ['quotation_id','description','quantity','unity_id', 'unitPrice','deliveryDate', 'status_id'];

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
            case 1: return __('content.quoted');
            case 2: return __('content.rejected');
            

        }
    }

}
