<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Http\Requests\Admin\StoreRegionRequest;
use App\Http\Requests\Admin\UpdateRegionRequest;
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
            return back()->withErrors($e->getMessage());
        }
        
    }

    public function destroy(Region $region)
    {
        try{
            $region->delete();
            return redirect()->route('regions.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    } 

    public function add(StoreRegionRequest $request )
    {
        try{
            Region::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
