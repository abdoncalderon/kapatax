<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ProjectRole;
use App\Models\ProjectUser;
use App\Http\Requests\Project\StoreProjectUserRequest;
use App\Models\StakeholderPerson;
use Exception;

class ProjectUserController extends Controller
{
    public function index()
    {
        $projectUsers = ProjectUser::where('project_id',session('current_project_id'))->get();
        return view('project.projectUsers.index')
        ->with(compact('projectUsers'));
    }

    public function create(User $user)
    {
        $availableUsers = StakeholderPerson::select('stakeholder_people.*')
                        ->join('stakeholders','stakeholder_people.stakeholder_id','=','stakeholders.id')
                        ->where('stakeholders.project_id',session('current_project_id'))
                        ->where('stakeholder_people.isActive',1)
                        ->get();
        $roles = ProjectRole::select('roles.*')->join('roles','project_roles.role_id','=','roles.id')->where('project_roles.project_id',session('current_project_id'))->get();
        return view('project.projectUsers.create')
        ->with(compact('user'))
        ->with(compact('availableUsers'))
        ->with(compact('roles'));
    }
    

    public function store(StoreProjectUserRequest $request, User $user)
    {
        try{
            ProjectUser::create($request ->validated());
            return redirect()->route('projectUsers.index',$user);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }
    
    public function destroy(ProjectUser $projectUser)
    {
        try{
            $user = $projectUser->user;
            $projectUser->delete();
            return redirect()->route('projectUsers.index',$user);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    
}
