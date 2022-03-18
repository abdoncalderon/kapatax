<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Project;
use App\Models\ProjectRole;
use App\Http\Requests\Settings\StoreProjectRoleRequest;
use Illuminate\Http\Request;
use Exception;

class ProjectRoleController extends Controller
{
    public function index(Project $project)
    {
        $projectRoles = ProjectRole::where('project_id',$project->id)->get();
        return view('settings.projectRoles.index')
        ->with(compact('project'))
        ->with(compact('projectRoles'));
    }

    public function create(Project $project)
    {
        $projectRoles = $project->projectRoles;
        $roles = Role::get();
        $availablesRoles = [];
        foreach ($roles as $role){
            $exist = false;
            foreach ($projectRoles as $projectRole){
                if($role->id==$projectRole->role_id){
                    $exist = true;
                    break;
                }
            }
            if (!$exist){
                array_push($availablesRoles,$role);
            }
        }
        $roles = Role::all();
        return view('settings.projectRoles.create')
        ->with(compact('project'))
        ->with(compact('availablesRoles'));
    }

    public function store(StoreProjectRoleRequest $request, Project $project)
    {
        try{
            ProjectRole::create($request ->validated());
            return redirect()->route('projectRoles.index',$project);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(ProjectRole $projectRole)
    {
        try{
            $project = $projectRole->project;
            $projectRole->delete();
            return redirect()->route('projectRoles.index',$project);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function getRoles(Request $request, $id)
    {
        if($request->ajax())
        {
            $roles = ProjectRole::select('roles.*')->join('roles','project_roles.role_id','=','roles.id')->where('project_roles.project_id',$id)->get();
            return response()->json($roles);
        }
    }

}
