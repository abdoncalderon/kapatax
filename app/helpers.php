<?php

use App\Models\ProjectUser;
use App\Models\Permit;
use App\Models\RolePermit;
use App\Models\Menu;
use App\Models\LocationUser;

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
        return $rolePermit->value;
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


