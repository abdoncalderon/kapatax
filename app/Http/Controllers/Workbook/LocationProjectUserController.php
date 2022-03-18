<?php

namespace App\Http\Controllers\Workbook;

use App\Http\Controllers\Controller;
use App\Models\ProjectUser;
use App\Models\Location;
use App\Models\LocationProjectUser;
use App\Http\Requests\Workbook\StoreLocationProjectUserRequest;
use App\Http\Requests\Workbook\UpdateLocationProjectUserRequest;
use Exception;

class LocationProjectUserController extends Controller
{
    public function index(ProjectUser $projectUser)
    {
        return view('workbooks.locationProjectUsers.index', compact('projectUser'));
    }

    public function create(ProjectUser $projectUser)
    {
        $myLocations = $projectUser->locationProjectUsers;
        $locations = Location::select('locations.*')
                    ->join('zones','locations.zone_id','=','zones.id')
                    ->where('zones.project_id',session('current_project_id'))
                    ->get();
        $availablesLocations = [];
        foreach ($locations as $location){
            $exist = false;
            foreach($myLocations as $myLocation)
            {
                if($myLocation->location_id==$location->id){
                    $exist = true;
                    break;
                }
            }
            if (!$exist){
                array_push($availablesLocations,$location);
            }
        }
        
        return view('workbooks.locationProjectUsers.create')
        ->with('projectUser',$projectUser)
        ->with('locations',$availablesLocations);
    }
      
    public function store(StoreLocationProjectUserRequest $request, ProjectUser $projectUser )
    {
        try{
            $dailyreportCollaborator = $request->has('dailyreport_collaborator');
            $dailyreportApprover = $request->has('dailyreport_approver');
            $folioApprover = $request->has('folio_approver');
            $receiveNotification = $request->has('receive_notification');
            $request ->validated();
            LocationProjectUser::create([
                'location_id'=>$request->location_id,
                'project_user_id'=>$request->project_user_id,
                'dailyreport_collaborator'=>$dailyreportCollaborator,
                'dailyreport_approver'=>$dailyreportApprover,
                'folio_approver'=>$folioApprover,
                'receive_notification'=>$receiveNotification,
            ]);
            return redirect()->route('locationProjectUsers.index',$projectUser);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function edit(LocationProjectUser $locationProjectUser)
    {
        $projectUser = $locationProjectUser->projectUser;
        return view('workbooks.locationProjectUsers.edit')
        ->with('locationProjectUser',$locationProjectUser)
        ->with('projectUser',$projectUser);
    }
    
    public function update(LocationProjectUser $locationProjectUser, UpdateLocationProjectUserRequest $request)
    {
        try{
            $projectUser = $locationProjectUser->projectUser;
            $dailyreportCollaborator = $request->has('dailyreport_collaborator');
            $dailyreportApprover = $request->has('dailyreport_approver');
            $folioApprover = $request->has('folio_approver');
            $receiveNotification = $request->has('receive_notification');
            $request->validated();
            $locationProjectUser->update([
                'dailyreport_collaborator'=>$dailyreportCollaborator,
                'dailyreport_approver'=>$dailyreportApprover,
                'folio_approver'=>$folioApprover,
                'receive_notification'=>$receiveNotification,
            ]);
            return redirect()->route('locationProjectUsers.index',$projectUser);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(LocationProjectUser $locationProjectUser)
    {
        try{
            $projectUser = $locationProjectUser->projectUser;
            $locationProjectUser->delete();
            return redirect()->route('locationProjectUsers.index',$projectUser);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
