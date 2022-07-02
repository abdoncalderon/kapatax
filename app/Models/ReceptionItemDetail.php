<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceptionItemDetail extends Model
{
    protected $fillable = ['reception_item_id','serialNumber', 'partNumber',];

    public function receptionItem()
    {
        return $this->belongsTo(ReceptionItem::class);
    }
}
