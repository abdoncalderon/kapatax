<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StakeholderPersonAsset extends Model
{
    protected $fillable = ['stakeholder_person_id','asset_id','deliveryDate','returnDate','deliveredBy','receivedBy','comments','isActive',];

    public function stakeholderPerson(){
        return $this->belongsTo(StakeholderPerson::class);
    }

    public function asset(){
        return $this->belongsTo(Asset::class);
    }

    public function deliveryUser(){
        return $this->belongsTo(ProjectUser::class,'deliveredBy','id');
    }

    public function returnUser(){
        return $this->belongsTo(ProjectUser::class,'receivedBy','id');
    }

}
