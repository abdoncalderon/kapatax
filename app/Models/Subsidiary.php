<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    protected $fillable = ['name', 'code', 'company_id', 'division_id','isActive', 'blocked'];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function division(){
        return $this->belongsTo(Division::class);
    }

}
