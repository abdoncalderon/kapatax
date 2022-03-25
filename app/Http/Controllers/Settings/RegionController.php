<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\Country;
use App\Http\Requests\Settings\StoreRegionRequest;
use App\Http\Requests\Settings\UpdateRegionRequest;
use Illuminate\Http\Request;

use Exception;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::get();
        return view('settings.regions.index', compact('regions'));
    }

    public function create()
    {
        return view('settings.regions.create');
    }

    public function store(StoreRegionRequest $request )
    {
        Region::create($request ->validated());
        return redirect()->route('regions.index');
    }

    public function show(Region $region)
    {
        return view('settings.regions.show',[
            'region'=>$region
            ]);
    }

    public function edit(Region $region)
    {
        return view('settings.regions.edit',[
            'region'=>$region
            ]);
    }
    
    public function update(Region $region, UpdateRegionRequest $request)
    {
        try{
            $region->update($request->validated());
            return redirect()->route('regions.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }

    public function destroy(Region $region)
    {
        try{
            $region->delete();
            return redirect()->route('regions.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    } 

    public function add(StoreRegionRequest $request )
    {
        try{
            Region::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
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

    
}
