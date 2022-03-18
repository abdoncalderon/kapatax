<?php

namespace App\Http\Controllers\Assets;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Material;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function getMaterial(Request $request, $id)
    {
        if($request->ajax())
        {
            $asset = Asset::find($id);
            $material = Material::select('families.name as family','categories.name as category','brands.name as brand','models.name as model')
                    ->join('categories','materials.category_id','=','categories.id')
                    ->join('families','categories.family_id','=','families.id')
                    ->join('models','materials.model_id','=','models.id')
                    ->join('brands','models.brand_id','=','brands.id')
                    ->where('materials.id',$asset->stockMovement->material->id)
                    ->first();
            return response()->json($material);
        }
    }
}
