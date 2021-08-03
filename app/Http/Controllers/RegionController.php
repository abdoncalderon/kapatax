<?php

namespace App\Http\Controllers;

use App\Region;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use Illuminate\Http\Request;

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
        $region->update($request->validated());
        return redirect()->route('regions.index');
    }
}
