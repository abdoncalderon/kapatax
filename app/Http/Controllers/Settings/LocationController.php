<?php

namespace App\Http\Controllers\Settings;

use App\Models\Location;
use App\Models\Project;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Http\Controllers\Controller;
use Exception;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::get();
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        $projects = Project::get();
        return view('locations.create')
        ->with('projects',$projects);
    }

    public function store(StoreLocationRequest $request )
    {
        Location::create($request ->validated());
        return redirect()->route('locations.index');
    }

    public function show(Location $location)
    {
        return view('locations.show',[
            'location'=>$location
            ]);
    }

    public function edit(Location $location)
    {
        return view('locations.edit',[
            'location'=>$location
            ]);
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
