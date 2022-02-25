<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Zone;
use App\Models\Project;
use App\Imports\ZonesImport;
use App\Http\Requests\Setting\StoreZoneRequest;
use App\Http\Requests\Setting\UpdateZoneRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
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
        $project = Project::where('id',session('current_project_id'))->first();
        return view('setting.zones.create')
        ->with(compact('project'));
    }

    public function store(StoreZoneRequest $request )
    {
        try{
            Zone::create($request ->validated());
            return redirect()->route('zones.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
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
        $project = Project::where('id',session('current_project_id'))->first();
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
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }
    
    public function destroy(Zone $zone)
    {
        try{
            $zone->delete();
            return redirect()->route('zones.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }   

    public function add(StoreZoneRequest $request )
    {
        try{
            Zone::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
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
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }
}
