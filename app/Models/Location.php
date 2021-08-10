<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name','code','project_id','sequence','dateStart','dateFinish','max_time_open_folio','max_time_create_dailyreport','max_time_create_note','max_time_create_comment',];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function turns()
    {
        return $this->hasMany(TurnLocation::class);
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
