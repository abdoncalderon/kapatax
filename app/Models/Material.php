<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['project_id','name','description','sku','upc','model_id','subcategory_id','group_id','partOf','unity_id','weight','volume',];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function model(){
        return $this->belongsTo(Mode1::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    public function unity(){
        return $this->belongsTo(Unity::class);
    }

    public function material(){
        return $this->belongsTo(Material::class,'partOf','id');
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }

}
