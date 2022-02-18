<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttachmentNote extends Model
{
    protected $fillable = ['note_id','filename','description',];

    public function note(){
        return $this->belongsTo(Note::class);
    }
}
