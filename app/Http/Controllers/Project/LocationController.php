<?php

namespace App\Http\Controllers\Project;

use App\Models\Location;
use App\Models\Project;
use App\Models\Zone;
use App\Http\Requests\Settings\StoreLocationRequest;
use App\Http\Requests\Settings\UpdateLocationRequest;
use App\Http\Controllers\Controller;
use Exception;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::get();
        return view('project.locations.index', compact('locations'));
    }

    public function create()
    {
        $zones = Zone::all();
        $project_id = session('current_project_id');
        $project = Project::where('id',$project_id)->first();
        return view('project.locations.create')
        ->with('project',$project)
        ->with('zones',$zones);
    }

    public function store(StoreLocationRequest $request )
    {
        Location::create($request ->validated());
        return redirect()->route('locations.index');
    }

    public function show(Location $location)
    {
        return view('project.locations.show',[
            'location'=>$location
            ]);
    }

    public function edit(Location $location)
    {
        $zones = Zone::all();
        $project_id = session('current_project_id');
        $project = Project::where('id',$project_id)->first();
        return view('project.locations.edit',[
            'location'=>$location
            ])->with('project',$project)->with('zones',$zones);
    }
    
    public function update(Location $location, UpdateLocationRequest $request)
    {
        $location->update($request->validated());
        return redirect()->route('locations.index');
    }

    public function destroy(Location $location)
    {
        try{
            $location->delete();
            return redirect()->route('locations.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }

        
    }
}
