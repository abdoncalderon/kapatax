<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Zone;
use App\Models\Project;
use App\Models\Location;
use App\Imports\ZonesImport;
use App\Http\Requests\Project\StoreZoneRequest;
use App\Http\Requests\Project\UpdateZoneRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Exception;

class ZoneController extends Controller
{
    public function index()
    {
        $zones = Zone::where('project_id',session('current_project_id'))->get();
        return view('project.zones.index', compact('zones'));
    }

    public function create()
    {
        $project = Project::where('id',session('current_project_id'))->first();
        return view('project.zones.create')
        ->with(compact('project'));
    }

    public function store(StoreZoneRequest $request )
    {
        try{
            Zone::create($request ->validated());
            return redirect()->route('zones.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function show(Zone $zone)
    {
        return view('project.zones.show',[
            'zone'=>$zone
            ]);
    }

    public function edit(Zone $zone)
    {
        $project = Project::where('id',session('current_project_id'))->first();
        return view('project.zones.edit',[
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
            return back()->withErrors( $e->getMessage());
        }
    }
    
    public function destroy(Zone $zone)
    {
        try{
            $zone->delete();
            return redirect()->route('zones.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }   

    public function add(StoreZoneRequest $request )
    {
        try{
            Zone::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function import(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                Excel::import(new ZonesImport,$file);
                return back();
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function getLocations(Request $request, $id)
    {
        if($request->ajax())
        {
            $locations = Location::where('zone_id',$id)->get();
            return response()->json($locations);
        }
    }
}
