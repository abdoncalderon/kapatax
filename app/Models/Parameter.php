<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $fillable = ['senderEmail','senderName','project_id'];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
