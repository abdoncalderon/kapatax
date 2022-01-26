<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipments';

    protected $fillable = ['name','project_id',];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    
}
