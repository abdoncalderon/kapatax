<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['project_id','name','description','model_id','category_id','unity_id'];
}
