<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Zone;
use App\Models\Project;
use App\Http\Requests\Setting\StoreZoneRequest;
use App\Http\Requests\Setting\UpdateZoneRequest;
use Exception;

class ZoneController extends Controller
{
    public function index()
    {
        $zones = Zone::where('project_id',session('current_project_id'))->get();
        return view('setting.zones.index', compact('zones'));
    }

    public function create()
    {
        $project_id = session('current_project_id');
        $project = Project::where('id',$project_id)->first();
        return view('setting.zones.create')
        ->with(compact('project'));
    }

    public function store(StoreZoneRequest $request )
    {
        try{
            Zone::create($request ->validated());
            return redirect()->route('zones.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function show(Zone $zone)
    {
        return view('setting.zones.show',[
            'zone'=>$zone
            ]);
    }

    public function edit(Zone $zone)
    {
        $project_id = session('current_project_id');
        $project = Project::where('id',$project_id)->first();
        return view('setting.zones.edit',[
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

    public function add(StoreZoneRequest $request )
    {
        try{
            Zone::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
