<?php

namespace App\Http\Controllers\Agreement;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Location;
use App\Models\LocationUser;
use App\Http\Requests\StoreLocationUserRequest;
use App\Http\Requests\UpdateLocationUserRequest;
use Exception;

class LocationUserController extends Controller
{
    public function index(User $user)
    {
        return view('agreement.locationsUsers.index', compact('user'));
    }

    public function create(User $user)
    {
        if($user->locations->count()>0){
            $locations = Location::select('locations.id as id','locations.name as name')->leftJoin('location_users','locations.id','=','location_users.location_id')->whereNull('user_id')->get();
        }else{
            $locations = Location::all();
        }
        return view('agreement.locationsUsers.create')
        ->with('user',$user)
        ->with('locations',$locations);
    }
      
    public function store(StoreLocationUserRequest $request, User $user )
    {
        $dailyreportCollaborator = $request->has('dailyreport_collaborator');
        $dailyreportApprover = $request->has('dailyreport_approver');
        $folioApprover = $request->has('folio_approver');
        $receiveNotification = $request->has('receive_notification');
        $request ->validated();
        LocationUser::create([
            'location_id'=>$request->location_id,
            'user_id'=>$request->user_id,
            'dailyreport_collaborator'=>$dailyreportCollaborator,
            'dailyreport_approver'=>$dailyreportApprover,
            'folio_approver'=>$folioApprover,
            'receive_notification'=>$receiveNotification,
        ]);
        return redirect()->route('locationsUsers.index',$user);
    }

    public function edit(LocationUser $locationUser)
    {
        $user = $locationUser->user;
        return view('agreement.locationsUsers.edit')
        ->with('locationUser',$locationUser)
        ->with('user',$user);
    }
    
    public function update(LocationUser $locationUser, UpdateLocationUserRequest $request)
    {
        $user = $locationUser->user;
        $dailyreportCollaborator = $request->has('dailyreport_collaborator');
        $dailyreportApprover = $request->has('dailyreport_approver');
        $folioApprover = $request->has('folio_approver');
        $receiveNotification = $request->has('receive_notification');
        $request->validated();
        $locationUser->update([
            'dailyreport_collaborator'=>$dailyreportCollaborator,
            'dailyreport_approver'=>$dailyreportApprover,
            'folio_approver'=>$folioApprover,
            'receive_notification'=>$receiveNotification,
        ]);
        return redirect()->route('locationsUsers.index',$user);
    }

    public function destroy(LocationUser $locationUser)
    {
        try{
            $locationUser->delete();
            return redirect()->route('locationsUsers.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
