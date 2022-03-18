    <?php

use App\Models\ProjectUser;
use App\Models\ProjectRole;
use App\Models\Permit;
use App\Models\Role;
use App\Models\RolePermit;
use App\Models\RoleMenu;
use App\Models\Menu;
use App\Models\LocationProjectUser;
use App\Models\Location;
use App\Models\Project;
use App\Models\LocationTurn;
use App\Models\Stakeholder;
use App\Models\Person;
use App\Models\NeedRequest;
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
        $projectUser = ProjectUser::where('user_id',auth()->user()->id)->where('project_id',session('current_project_id'))->first();
        return $projectUser;
    }
}

if (! function_exists('user_have_permission')) {
    function user_have_permission($permit)
    {
        $role = current_user()->projectRole->role;
        $permit = Permit::where('name',$permit)->first();
        $rolePermit = RolePermit::where('role_id',$role->id)->where('permit_id',$permit->id)->first();
        return $rolePermit->isActive;
    }
}

if (! function_exists('user_managed_locations')) {
    function user_managed_locations(ProjectUser $projectUser)
    {
        $locationProjectUsers = LocationProjectUser::where('project_user_id',$projectUser->id)->get();
        return $locationProjectUsers;
    }
}

if (! function_exists('menu_access_users')) {
    function menu_access_users($code)
    {
        $menu = Menu::where('code',$code)->first();
        $projectUsers = ProjectUser::select('project_users.*')
                                    ->join('project_roles','project_users.project_role_id','=','project_roles.id')
                                    ->join('roles','project_roles.role_id','=','roles.id')
                                    ->join('role_menus','roles.id','=','role_menus.role_id')
                                    ->join('menus','role_menus.menu_id','=','menus.id')
                                    ->where('menus.id',$menu->id)
                                    ->where('project_users.project_id',current_user()->project_id)
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
            return back()->withErrors( $e->getMessage());
        }
    }
}

if (! function_exists('assign_menus_to_role')) {
    function assign_menus_to_role(Role $role)
    {
        try{
            $menus = Menu::all();
            foreach ($menus as $menu){
                $roleMenu = RoleMenu::create([
                    'role_id' => $role->id,
                    'menu_id' => $menu->id,
                ]);
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}

if (! function_exists('assign_roles_to_menu')) {
    function assign_roles_to_menu(Menu $menu)
    {
        try{
            $roles = Role::all();
            foreach ($roles as $role){
                $roleMenu = RoleMenu::create([
                    'role_id' => $role->id,
                    'menu_id' => $menu->id,
                ]);
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}

if (! function_exists('assign_roles_to_permit')) {
    function assign_roles_to_permit(Permit $permit)
    {
        try{
            $roles = Role::all();
            foreach ($roles as $role){
                $rolePermit = RolePermit::create([
                    'role_id' => $role->id,
                    'permit_id' => $permit->id,
                ]);
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}

if (! function_exists('user_have_profile_in_location')) {
    function user_have_profile_in_location($profile, Location $location)
    {
        
        $locationProjectUser = LocationProjectUser::where('project_user_id',current_user()->id)->where('location_id',$location->id)->first();
        switch ($profile){
            case 'dailyreport_collaborator';
                return $locationProjectUser->dailyreport_collaborator;
            case 'dailyreport_approver';
                return $locationProjectUser->dailyreport_approver;
            case 'folio_approver';
                return $locationProjectUser->folio_approver;
            case 'receive_notification';
                return $locationProjectUser->receive_notification;
        }
    }
}

if (! function_exists('is_valid_date_for_location')) {
    function is_valid_date_for_location($date, Location $location)
    {
        $startDateLocation=strtotime($location->startDate);
        $finishDateLocation=strtotime($location->finishDate);
        if ((strtotime($date)>=$startDateLocation)&&(strtotime($date)<=$finishDateLocation)){
            return true;
        } else {
            return false;
        }
    }
}

if (! function_exists('is_valid_date_for_project')) {
    function is_valid_date_for_project($date, Project $project)
    {
        if ((strtotime($date)>=strtotime($project->startDate))&&(strtotime($date)<=strtotime($project->finishDate))){
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
        if ((strtotime($date)>=$dateFromLocationTurn)&&(strtotime($date)<=$dateToLocationTurn)){
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
        $differenceInHours = abs(round((strtotime($date) - $today)/60/60,0));
        
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
        $differenceInHours = abs(round((strtotime($date) - $today)/60/60,0));
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
        $differenceInHours = abs(round((strtotime($date) - $today)/60/60,0));
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
        $differenceInHours = abs(round((strtotime($date) - $today)/60/60,0));
        if (($differenceInHours <= $location->max_time_create_comment)){
            return true;
        }else{
            return false;
        }
    }
}

if (! function_exists('is_role_menu_active')) {
    function is_role_menu_active(ProjectRole $projectRole, Menu $menu)
    {
        try{
            $roleMenu=RoleMenu::where('role_id',$projectRole->role->id)->where('menu_id',$menu->id)->first();
            if (!empty($roleMenu)){
                return $roleMenu->isActive;
            }else{
                return false;
            }
            
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}

if (! function_exists('stakeholder_logofile')) {
    function stakeholder_logofile(Project $project, $position)
    {
        switch($position){
            case 1: $stakeholder=Stakeholder::where('id',$project->stakeholderLogo1_id)->first();
            case 2: $stakeholder=Stakeholder::where('id',$project->stakeholderLogo2_id)->first();
            case 3: $stakeholder=Stakeholder::where('id',$project->stakeholderLogo3_id)->first();
            case 4: $stakeholder=Stakeholder::where('id',$project->stakeholderLogo4_id)->first();
            break;
        }
        
        if (!empty($stakeholder)){
            return $stakeholder->logofile;
        }else{
            return 'logo.png';
        }
            
    }
}

if (! function_exists('is_valid_date_for_admission')) {
    function is_valid_date_for_admission($date, $person_id)
    {
        $flag = true;
        $person = Person::find($person_id);
        foreach($person->stakeholderPeople as $stakeholderPerson){
            $admissionDate = strtotime($stakeholderPerson->admissionDate);
            $departureDate = strtotime($stakeholderPerson->departureDate);
            if((strtotime($date)>=$admissionDate)&&(strtotime($date)<=$departureDate)){
                $flag = false;
                break;
            }
        }
        return $flag;
    }
}

if (! function_exists('is_valid_date_for_departure')) {
    function is_valid_date_for_departure($date, $person_id)
    {
        $flag = true;
        $person = Person::find($person_id);
        foreach($person->stakeholderPeople as $stakeholderPerson){
            $admissionDate = strtotime($stakeholderPerson->admissionDate);
            $departureDate = strtotime($stakeholderPerson->departureDate);
            if((strtotime($date)>=$admissionDate)&&(strtotime($date)<=$departureDate)){
                $flag = false;
                break;
            }
        }
        return $flag;
    }
}


if (! function_exists('is_active_stakeholder_person')) {
    function is_active_stakeholder_person(Person $person)
    {
        $flag = false;
        foreach($person->stakeholderPeople as $stakeholderPerson){
            if($stakeholderPerson->isActive()){
                $flag = true;
                break;
            }
        }
        return $flag;
    }
}

if (! function_exists('exception_code')) {
    function exception_code($code)
    {
        switch ($code) {
            case '23000':
                return __('messages.transactionError').' - '.__('messages.duplicateRecord');
            default:
                return __('messages.transactionError');
        }
    }
}

if (! function_exists('update_need_request_items_status')) {
    function update_need_request_items_status(NeedRequest $needRequest, $status)
    {
        try{
            foreach ($needRequest->needRequestItems as $needRequestItem){
                $needRequestItem->update([
                    'status_id'=>$status,
                ]);
            }
            return true;
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}

if (! function_exists('my_pending_requests')) {
    function my_pending_requests()
    {
        $pendingRequests = NeedRequest::where('project_user_id',current_user()->id)
                                        ->where('status_id','<=',5)
                                        ->get();
        return $pendingRequests->count();
    }
}

if (! function_exists('my_pending_approvals')) {
    function my_pending_approvals()
    {
        $pendingApprovals = NeedRequest::where('approving_user_id',current_user()->id)
                                        ->get();
        return $pendingApprovals->count();
    }
}



