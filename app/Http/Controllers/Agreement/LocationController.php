<?php

namespace App\Http\Controllers\Agreement;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Project;
use App\Models\Zone;
use App\Http\Requests\Agreement\StoreLocationRequest;
use App\Http\Requests\Agreement\UpdateLocationRequest;
use Exception;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::get();
        return view('agreement.locations.index', compact('locations'));
    }

    public function create()
    {
        $zones = Zone::all();
        $project_id = session('current_project_id');
        $project = Project::where('id',$project_id)->first();
        return view('agreement.locations.create')
        ->with('project',$project)
        ->with('zones',$zones);
    }

    public function store(StoreLocationRequest $request )
    {
        Location::create($request ->validated());
        return redirect()->route('workbook_settings_locations');
    }

    public function show(Location $location)
    {
        return view('agreement.locations.show',[
            'location'=>$location
            ]);
    }

    public function edit(Location $location)
    {
        $zones = Zone::all();
        $project_id = session('current_project_id');
        $project = Project::where('id',$project_id)->first();
        return view('agreement.locations.edit',[
            'location'=>$location
            ])->with('project',$project)->with('zones',$zones);
    }
    
    public function update(Location $location, UpdateLocationRequest $request)
    {
        $location->update($request->validated());
        return redirect()->route('workbook_settings_locations');
    }

    public function destroy(Location $location)
    {
        try{
            $location->delete();
            return redirect()->route('workbook_settings_locations');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
