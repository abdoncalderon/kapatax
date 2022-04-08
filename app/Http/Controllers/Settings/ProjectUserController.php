<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Project;
use App\Models\Role;
use App\Models\ProjectUser;
use App\Http\Requests\Settings\StoreProjectUserRequest;
use App\Http\Requests\Settings\UpdateProjectUserRequest;
use Exception;
use Illuminate\Http\Request;

class ProjectUserController extends Controller
{
    public function index(Project $project)
    {
        return view('settings.projectUsers.index', compact('project'));
    }

    public function create(Project $project)
    {
        $projectUsers = $project->projectUsers;
        $users = User::get();
        $availablesUsers = [];
        foreach ($users as $user){
            $exist = false;
            foreach ($projectUsers as $projectUser){
                if($user->id==$projectUser->user_id){
                    $exist = true;
                    break;
                }
            }
            if (!$exist){
                array_push($availablesUsers,$user);
            }
        }
        return view('settings.projectUsers.create',compact('project'))
        ->with(compact('availablesUsers'));
    }

    public function store(Project $project, StoreProjectUserRequest $request)
    {
        try{
            ProjectUser::create($request ->validated());
            return redirect()->route('settings.projectUsers.index',$project);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function edit(ProjectUser $projectUser)
    {
        $project = $projectUser->project;
        return view('settings.projectUsers.edit')
        ->with(compact('projectUser'))
        ->with(compact('project'));
    }

    public function update(UpdateProjectUserRequest $request, ProjectUser $projectUser)
    {
        try{
            $projectUser->update($request->validated());
            return redirect()->route('settings.projectUsers.index',$projectUser->project);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
    
    public function destroy(ProjectUser $projectUser)
    {
        try{
            $project = $projectUser->project;
            $projectUser->delete();
            return redirect()->route('settings.projectUsers.index',$project);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
