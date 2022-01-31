<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name','code','zone_id','sequence','startDate','finishDate','latitude','longitude','max_time_open_folio','max_time_create_dailyreport','max_time_create_note','max_time_create_comment',];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function turns()
    {
        return $this->hasMany(LocationTurn::class);
    }

    public function folios()
    {
        return $this->hasMany(Folio::class);
    }

    public function uploadSequence(){
        $newSequence = $this->sequence + 1;
        $this->update([
            'sequence' => $newSequence,
        ]);
    }
}
