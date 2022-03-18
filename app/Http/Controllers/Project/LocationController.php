<?php

namespace App\Http\Controllers\Project;

use App\Models\Location;
use App\Models\Project;
use App\Models\Zone;
use App\Http\Requests\Project\StoreLocationRequest;
use App\Http\Requests\Project\UpdateLocationRequest;
use App\Http\Controllers\Controller;
use Exception;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::select('locations.*')
                    ->join('zones','locations.zone_id','=','zones.id')
                    ->where('zones.project_id',session('current_project_id'))
                    ->get();
        return view('project.locations.index', compact('locations'));
    }

    public function create()
    {
        $zones = Zone::where('project_id',session('current_project_id'))->get();
        return view('project.locations.create')
        ->with('project',current_user()->project)
        ->with('zones',$zones);
    }

    public function store(StoreLocationRequest $request )
    {
        try{
            if((is_valid_date_for_project($request->startDate,current_user()->project))&&(is_valid_date_for_project($request->finishDate,current_user()->project))){
                if(strtotime($request->startDate)<=strtotime($request->finishDate)){
                    Location::create($request ->validated());
                    return redirect()->route('locations.index');
                }else{
                    return back()->withErrors(__('messages.dateRangeError'));
                }
            }else{
                return back()->withErrors(__('messages.dateOutsideProjectExecution'));
            }
            
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function show(Location $location)
    {
        return view('project.locations.show',[
            'location'=>$location
            ]);
    }

    public function edit(Location $location)
    {
        $zones = Zone::where('project_id',session('current_project_id'))->get();
        return view('project.locations.edit',['location'=>$location])
        ->with('project',current_user()->project)
        ->with('zones',$zones);
    }
    
    public function update(Location $location, UpdateLocationRequest $request)
    {
        try{
            if((is_valid_date_for_project($request->startDate,current_user()->project))&&(is_valid_date_for_project($request->finishDate,current_user()->project))){
                if(strtotime($request->startDate)<=strtotime($request->finishDate)){
                    $location->update($request->validated());
                    return redirect()->route('locations.index');
                }else{
                    return back()->withErrors(__('messages.dateRangeError'));
                }
            }else{
                return back()->withErrors(__('messages.dateOutsideProjectExecution'));
            }
            
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(Location $location)
    {
        try{
            $location->delete();
            return redirect()->route('locations.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }

        
    }
}
