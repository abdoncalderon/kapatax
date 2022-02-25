<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Project;
use App\Models\Role;
use App\Models\ProjectUser;
use App\Http\Requests\Admin\StoreProjectUserRequest;
use App\Http\Requests\Admin\UpdateProjectUserRequest;
use Exception;

class UserProjectController extends Controller
{
    public function index(User $user)
    {
        $projectUsers = ProjectUser::where('user_id',$user->id)->get();
        return view('admin.userProjects.index', compact('user'))
        ->with(compact('projectUsers'));
    }

    public function create(User $user)
    {
        $projectUsers = $user->projectUsers;
        $projects = Project::get();
        $availablesProjects = [];
        foreach ($projects as $project){
            $exist = false;
            foreach ($projectUsers as $projectUser){
                if($project->id==$projectUser->project_id){
                    $exist = true;
                    break;
                }
            }
            if (!$exist){
                array_push($availablesProjects,$project);
            }
        }
        $roles = Role::all();
        return view('admin.userProjects.create')
        ->with(compact('user'))
        ->with(compact('availablesProjects'))
        ->with(compact('roles'));
    }

    public function edit(ProjectUser $projectUser)
    {
        $roles = Role::all();
        return view('admin.userProjects.edit')
        ->with(compact('projectUser'))
        ->with(compact('roles'));
    }

    public function store(StoreProjectUserRequest $request, User $user)
    {
        try{
            ProjectUser::create($request ->validated());
            return redirect()->route('userProjects.index',$user);
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function update(UpdateProjectUserRequest $request, ProjectUser $projectUser)
    {
        $projectUser->update($request->validated());
        return redirect()->route('userProjects.index',$projectUser->user);
    }
    
    public function destroy(ProjectUser $projectUser)
    {
        try{
            $user = $projectUser->user;
            $projectUser->delete();
            return redirect()->route('userProjects.index',$user);
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }
}
