<?php

use App\Models\ProjectUser;
use App\Models\Permit;
use App\Models\Role;
use App\Models\RolePermit;
use App\Models\RoleMenu;
use App\Models\Menu;
use App\Models\LocationUser;
use App\Models\Location;
use App\Models\Project;
use App\Models\LocationTurn;
use Carbon\Carbon;

function yesNo($value){
    if ($value==1){
        return __('content.yes');
    }else{
        return __('content.no');
    }
}

function checked($value){
    if ($value==1){
        return 'checked';
    }else{
        return '';
    }
}

if (! function_exists('current_user')) {
    function current_user()
    {
        $projectId = session('current_project_id');
        $projectUser = ProjectUser::where('user_id',auth()->user()->id)->where('project_id', $projectId)->first();
        return $projectUser;
    }
}

if (! function_exists('user_have_permission')) {
    function user_have_permission($permit)
    {
        $role = current_user()->role;
        $permit = Permit::where('name',$permit)->first();
        $rolePermit = RolePermit::where('role_id',$role->id)->where('permit_id',$permit->id)->first();
        return $rolePermit->isActive;
    }
}

if (! function_exists('user_managed_locations')) {
    function user_managed_locations(ProjectUser $projectUser)
    {
        $user = $projectUser->user;
        $userLocations = LocationUser::where('user_id',$user->id)->get();
        return $userLocations;
    }
}

if (! function_exists('menu_access_users')) {
    function menu_access_users($code)
    {
        $projectId = session('current_project_id');
        $menu = Menu::where('code',$code)->first();
        $projectUsers = ProjectUser::join('roles','project_users.role_id','=','roles.id')
                                    ->join('role_menus','roles.id','=','role_menus.role_id')
                                    ->join('menus','role_menus.menu_id','=','menus.id')
                                    ->where('menus.id',$menu->id)
                                    ->get();
        
        return $projectUsers;
    }
}

if (! function_exists('assign_permits_to_role')) {
    function assign_permits_to_role(Role $role)
    {
        try{
            $permits = Permit::all();
            foreach ($permits as $permit){
                $rolePermit = RolePermit::create([
                    'role_id' => $role->id,
                    'permit_id' => $permit->id,
                ]);
            }
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}

if (! function_exists('assign_menus_to_role')) {
    function assign_menus_to_role(Role $role)
    {
        try{
            $menus = RoleMenu::where();
            foreach ($menus as $menu){
                $roleMenu = RoleMenu::create([
                    'role_id' => $role->id,
                    'menu_id' => $menu->id,
                ]);
            }
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}

if (! function_exists('user_have_profile_in_location')) {
    function user_have_profile_in_location($profile, Location $location)
    {
        $user = current_user()->user;
        $locationUser = LocationUser::where('user_id',$user->id)->where('location_id',$location->id)->first();
        switch ($profile){
            case 'dailyreport_collaborator';
                return $locationUser->dailyreport_collaborator;
            case 'dailyreport_approver';
                return $locationUser->dailyreport_approver;
            case 'folio_approver';
                return $locationUser->folio_approver;
            case 'receive_notification';
                return $locationUser->receive_notification;
        }
    }
}

if (! function_exists('is_valid_date_for_location')) {
    function is_valid_date_for_location($date, Location $location)
    {
        $finishDateLocation=strtotime($location->finishDate);
        $startDateLocation=strtotime($location->startDate);
        if (($date>=$startDateLocation)&&($date<=$finishDateLocation)){
            return true;
        } else {
            return false;
        }
    }
}

if (! function_exists('is_valid_date_for_project')) {
    function is_valid_date_for_project($date, Project $project)
    {
        $finishDateProject=strtotime($project->finishDate);
        $startDateProject=strtotime($project->startDate);
        if (($date>=$startDateProject)&&($date<=$finishDateProject)){
            return true;
        } else {
            return false;
        }
    }
}

if (! function_exists('is_valid_date_for_turn')) {
    function is_valid_date_for_turn($date, LocationTurn $locationTurn)
    {
        $dateFromLocationTurn=strtotime($locationTurn->dateFrom);
        $dateToLocationTurn=strtotime($locationTurn->dateTo);
        if (($date>=$dateFromLocationTurn)&&($date<=$dateToLocationTurn)){
            return true;
        } else {
            return false;
        }
    }
}

if (! function_exists('is_valid_date_for_open_folio')) {
    function is_valid_date_for_open_folio($date, Location $location)
    {
        $today = strtotime(Carbon::today()->toDateString());
        $differenceInHours = abs(round(($date - $today)/60/60,0));
        
        if ($differenceInHours <= $location->max_time_open_folio){
            return true;
        }else{
            return false;
        }
    }
}

if (! function_exists('is_valid_date_for_create_dailyreport')) {
    function is_valid_date_for_create_dailyreport($date, Location $location)
    {
        $today = strtotime(Carbon::today()->toDateString());
        $differenceInHours = abs(round(($date - $today)/60/60,0));
        if (($differenceInHours <= $location->max_time_create_dailyreport)){
            return true;
        }else{
            return false;
        }
    }
}

if (! function_exists('is_valid_date_for_create_note')) {
    function is_valid_date_for_create_note($date, Location $location)
    {
        $today = strtotime(Carbon::today()->toDateString());
        $differenceInHours = abs(round(($date - $today)/60/60,0));
        if (($differenceInHours <= $location->max_time_create_note)){
            return true;
        }else{
            return false;
        }
    }
}

if (! function_exists('is_valid_date_for_create_comment')) {
    function is_valid_date_for_create_comment($date, Location $location)
    {
        $today = strtotime(Carbon::today()->toDateString());
        $differenceInHours = abs(round(($date - $today)/60/60,0));
        if (($differenceInHours <= $location->max_time_create_comment)){
            return true;
        }else{
            return false;
        }
    }
}



