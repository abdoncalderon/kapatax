<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectRole extends Model
{
    protected $fillable = ['project_id','role_id','isActive',];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
