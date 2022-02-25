<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Imports\BrandsImport;
use App\Http\Requests\Admin\StoreBrandRequest;
use App\Http\Requests\Admin\UpdateBrandRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Exception;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::get();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(StoreBrandRequest $request )
    {
        Brand::create($request ->validated());
        return redirect()->route('brands.index');
    }

    public function show(Brand $brand)
    {
        return view('admin.brands.show',[
            'brand'=>$brand
            ]);
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit',[
            'brand'=>$brand
            ]);
    }
    
    public function update(Brand $brand, UpdateBrandRequest $request)
    {
        try{
            $brand->update($request->validated());
            return redirect()->route('brands.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function destroy(Brand $brand)
    {
        try{
            $brand->delete();
            return redirect()->route('brands.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    } 

    public function add(StoreBrandRequest $request )
    {
        try{
            Brand::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
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
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
        
    }
}
