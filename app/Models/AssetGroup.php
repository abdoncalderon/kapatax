<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetGroup extends Model
{
    protected $fillable = ['project_id','name','code','description','isDepreciable','depreciation_type_id','usableTimeYears','usableTimeMonths',];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function depreciationType(){
        return $this->belongsTo(DepreciationType::class);
    }
}
