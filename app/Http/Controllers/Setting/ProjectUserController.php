<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Project;
use App\Models\Role;
use App\Models\ProjectUser;
use App\Http\Requests\Admin\StoreProjectUserRequest;
use App\Models\StakeholderPerson;
use Exception;

class ProjectUserController extends Controller
{
    public function index()
    {
        $projectUsers = ProjectUser::where('project_id',session('current_project_id'))->get();
        return view('setting.projectUsers.index')
        ->with(compact('projectUsers'));
    }

    public function create(User $user)
    {
        /* $myProjects = $user->projectUsers;
        $projects = Project::get();
        $availablesProjects = [];
        foreach ($projects as $menu){
            $exist = false;
            foreach($myProjects as $myProject)
            {
                if($menu->id==$myProject->menu_id){
                    $exist = true;
                    break;
                }
            }
            if (!$exist){
                array_push($availablesProjects,$menu);
            }
        }
        $projects = ProjectUser::where('user_id','!=',$user->id); */
        $availableUsers = User::select('users.*')
                        ->join('people','users.person_id','=','people.id')
                        ->join('stakeholder_people','people.id','=','stakeholder_people.person_id')
                        ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                        ->where('stakeholders.project_id',session('current_project_id'))
                        ->get();
       /*  $stakeholderPeople = StakeholderPerson::select('stakeholder_people.*')
                            ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                            ->where('stakeholders.project_id',session('current_project_id'))
                            ->get(); */
        $roles = Role::all();
        return view('setting.projectUsers.create')
        ->with(compact('availableUsers'))
        ->with(compact('roles'));
    }

    public function store(StoreProjectUserRequest $request, User $user)
    {
        try{
            ProjectUser::create($request ->validated());
            return redirect()->route('projectUsers.index',$user);
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
        
    }
    
    public function destroy(ProjectUser $projectUser)
    {
        try{
            $user = $projectUser->user;
            $projectUser->delete();
            return redirect()->route('projectUsers.index',$user);
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }
}
