<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['folio_id','turn_id','date','note','project_user_id','status',];

    public function folio()
    {
        return $this->belongsTo(Folio::class);
    }

    public function turn()
    {
        return $this->belongsTo(Turn::class);
    }

    public function projectUser()
    {
        return $this->belongsTo(ProjectUser::class);
    }

    public function attachments()
    {
        return $this->hasMany(AttachmentNote::class);
    }

    public function comments()
    {
        return $this->hasMany(CommentNote::class);
    }

    public function haveComments(){
        return  $this->comments()->count() > 0;
        
    }
}
