<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    protected $fillable = ['folio_id','turn_id','report','project_user_id','status','approvedby','reviewedby','responsible',];
    
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

    public function equipments()
    {
        return $this->hasMany(EquipmentDailyReport::class);
    }

    public function positions()
    {
        return $this->hasMany(PositionDailyReport::class);
    }

    public function events()
    {
        return $this->hasMany(EventDailyReport::class);
    }

    public function attachments()
    {
        return $this->hasMany(AttachmentDailyReport::class);
    }

    public function comments()
    {
        return $this->hasMany(CommentDailyReport::class);
    }

    public function reviewer()
    {
        $projectUser = ProjectUser::find($this->reviewedby);
        return $projectUser->user;
    }

    public function approver()
    {
        $projectUser = ProjectUser::find($this->approvedby);
        return $projectUser->user;
    }

    public function responsible()
    {
        $projectUser = ProjectUser::find($this->responsible);
        return $projectUser->user;
    }
    
    public function haveCommentsReport(){
        $comments = $this->comments();
        $answer = false;
        foreach($comments as $comment){
            if ($comment->section=='report') {
                $answer = true;
                break;
            }
        }
        return $answer;
    }

    public function haveCommentsEquipments(){
        $comments = $this->comments();
        $answer = false;
        foreach($comments as $comment){
            if ($comment->section=='report') {
                $answer = true;
                break;
            }
        }
        return $answer;
    }

    public function haveCommentsPositions(){
        $comments = $this->comments();
        $answer = false;
        foreach($comments as $comment){
            if ($comment->section=='report') {
                $answer = true;
                break;
            }
        }
        return $answer;
    }

    public function haveCommentsEvents(){
        $comments = $this->comments();
        $answer = false;
        foreach($comments as $comment){
            if ($comment->section=='report') {
                $answer = true;
                break;
            }
        }
        return $answer;
    }

    public function haveCommentsAttachments(){
        $comments = $this->comments();
        $answer = false;
        foreach($comments as $comment){
            if ($comment->section=='report') {
                $answer = true;
                break;
            }
        }
        return $answer;
    }

    public function status(){
        $status = $this->status;
        if ($status==0){
            return __('content.draft');
        }elseif($status==1){
            return __('content.finalized');
        }elseif($status==2){
            return __('content.approved');
        }
    }
}
