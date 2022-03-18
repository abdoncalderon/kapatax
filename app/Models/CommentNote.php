<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentNote extends Model
{
    protected $fillable = ['note_id','date','comment','project_user_id',];

    public function note()
    {
        return $this->belongsTo(Note::class);
    }

    public function projectUser()
    {
        return $this->belongsTo(ProjectUser::class);
    }
}
