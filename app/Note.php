<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    // use HasFactory;

    protected $fillable = ['folio_id','turn_id','date','note','user_id','status',];

    public function folio()
    {
        return $this->belongsTo(Folio::class);
    }

    public function turn()
    {
        return $this->belongsTo(Turn::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
