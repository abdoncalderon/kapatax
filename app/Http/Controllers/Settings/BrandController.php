<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Mode1;
use App\Imports\BrandsImport;
use App\Http\Requests\Settings\StoreBrandRequest;
use App\Http\Requests\Settings\UpdateBrandRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Exception;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::get();
        return view('settings.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('settings.brands.create');
    }

    public function store(StoreBrandRequest $request )
    {
        Brand::create($request ->validated());
        return redirect()->route('brands.index');
    }

    public function show(Brand $brand)
    {
        return view('settings.brands.show',[
            'brand'=>$brand
            ]);
    }

    public function edit(Brand $brand)
    {
        return view('settings.brands.edit',[
            'brand'=>$brand
            ]);
    }
    
    public function update(Brand $brand, UpdateBrandRequest $request)
    {
        try{
            $brand->update($request->validated());
            return redirect()->route('brands.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(Brand $brand)
    {
        try{
            $brand->delete();
            return redirect()->route('brands.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    } 

    public function add(StoreBrandRequest $request )
    {
        try{
            Brand::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function import(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                Excel::import(new BrandsImport,$file);
                return back()->with('success',__('messages.successfullImport'));
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function getModels(Request $request, $id)
    {
        if($request->ajax())
        {
            $models = Mode1::where('brand_id',$id)->get();
            return response()->json($models);
        }
    }
}
