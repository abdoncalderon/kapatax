<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Project;
use App\Models\Role;
use App\Models\UserProject;
use App\Http\Requests\Admin\StoreUserProjectRequest;
use Exception;

class UserProjectController extends Controller
{
    public function index(User $user)
    {
        $userProjects = UserProject::where('user_id',$user->id)->get();
        return view('admin.userProjects.index', compact('user'))
        ->with(compact('userProjects'));
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
        $projects = UserProject::where('user_id','!=',$user->id);
        $roles = Role::all();
        return view('admin.userProjects.create')
        ->with('user',$user)
        ->with(compact('availablesProjects'))
        ->with(compact('roles'));
    }

    public function store(StoreUserProjectRequest $request, User $user)
    {
        try{
            UserProject::create($request ->validated());
            return redirect()->route('userProjects.index',$user);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
        
    }
    

    public function destroy(UserProject $userProject)
    {
        try{
            $user = $userProject->user;
            $userProject->delete();
            return redirect()->route('userProjects.index',$user);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
