<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\Country;
use App\Http\Requests\Admin\StoreRegionRequest;
use App\Http\Requests\Admin\UpdateRegionRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RegionsImport;
use Exception;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::get();
        return view('admin.regions.index', compact('regions'));
    }

    public function create()
    {
        return view('admin.regions.create');
    }

    public function store(StoreRegionRequest $request )
    {
        Region::create($request ->validated());
        return redirect()->route('regions.index');
    }

    public function show(Region $region)
    {
        return view('admin.regions.show',[
            'region'=>$region
            ]);
    }

    public function edit(Region $region)
    {
        return view('admin.regions.edit',[
            'region'=>$region
            ]);
    }
    
    public function update(Region $region, UpdateRegionRequest $request)
    {
        try{
            $region->update($request->validated());
            return redirect()->route('regions.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
        
    }

    public function destroy(Region $region)
    {
        try{
            $region->delete();
            return redirect()->route('regions.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    } 

    public function add(StoreRegionRequest $request )
    {
        try{
            Region::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function getCountries(Request $request, $id)
    {
        if($request->ajax())
        {
            $countries = Country::where('region_id',$id)->get();
            return response()->json($countries);
        }
    }

    public function import(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                Excel::import(new RegionsImport,$file);
                return back()->with('success',__('content.import').' '.__('content.successfull'));
            }
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
        
    }
}
