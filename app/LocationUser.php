<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationUser extends Model
{
    // use HasFactory;

    protected $fillable = ['location_id','user_id','dailyreport_collaborator','dailyreport_approver','folio_approver','receive_notification',];

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
