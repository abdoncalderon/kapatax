<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Zone;
use App\Models\Project;
use App\Http\Requests\Settings\StoreZoneRequest;
use App\Http\Requests\Settings\UpdateZoneRequest;
use Exception;

class ZoneController extends Controller
{
    public function index()
    {
        $zones = Zone::get();
        return view('settings.zones.index', compact('zones'));
    }

    public function create()
    {
        $project_id = session('current_project_id');
        $project = Project::where('id',$project_id)->first();
        return view('settings.zones.create')
        ->with(compact('project'));
    }

    public function store(StoreZoneRequest $request )
    {
        try{

        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
        Zone::create($request ->validated());
        return redirect()->route('zones.index');
    }

    public function show(Zone $zone)
    {
        return view('settings.zones.show',[
            'zone'=>$zone
            ]);
    }

    public function edit(Zone $zone)
    {
        $project_id = session('current_project_id');
        $project = Project::where('id',$project_id)->first();
        return view('settings.zones.edit',[
            'zone'=>$zone
            ])
        ->with(compact('project'));
    }
    
    public function update(Zone $zone, UpdateZoneRequest $request)
    {
        try{
            $zone->update($request->validated());
            return redirect()->route('zones.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
    
    public function destroy(Zone $zone)
    {
        try{
            $zone->delete();
            return redirect()->route('zones.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }   
}