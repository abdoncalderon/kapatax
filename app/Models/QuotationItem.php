<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{
    protected $fillable = ['quotation_id','material_id','quantity','unitPrice','deliveryDate'];

    public function quotationRequest()
    {
        return $this->belongsTo(QuotationRequest::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

}
