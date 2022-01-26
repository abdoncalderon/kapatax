<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Project;
use App\Models\Role;
use App\Models\ProjectUser;
use App\Http\Requests\Admin\StoreProjectUserRequest;
use Exception;

class ProjectUserController extends Controller
{
    public function index(User $user)
    {
        $projectUsers = ProjectUser::where('user_id',$user->id)->get();
        return view('admin.projectUsers.index', compact('user'))
        ->with(compact('projectUsers'));
    }

    public function create(User $user)
    {
        $myProjects = $user->projects;
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
        $projects = ProjectUser::where('user_id','!=',$user->id);
        $roles = Role::all();
        return view('admin.projectUsers.create')
        ->with('user',$user)
        ->with(compact('availablesProjects'))
        ->with(compact('roles'));
    }

    public function store(StoreProjectUserRequest $request, User $user)
    {
        try{
            ProjectUser::create($request ->validated());
            return redirect()->route('projectUsers.index',$user);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
        
    }
    
    public function destroy(ProjectUser $projectUser)
    {
        try{
            $user = $projectUser->user;
            $projectUser->delete();
            return redirect()->route('projectUsers.index',$user);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
