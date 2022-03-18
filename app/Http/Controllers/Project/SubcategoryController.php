<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\Project\StoreSubcategoryRequest;
use Exception;


class SubcategoryController extends Controller
{
    public function add(StoreSubcategoryRequest $request )
    {
        try{
            Subcategory::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
