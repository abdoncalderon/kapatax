<?php

namespace App\Http\Controllers;


use App\Models\Project;
use App\Models\UserProject;
use App\User;
use Illuminate\Http\Request;
use App\Models\RoleMenu;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $project_id = session('current_project_id');
        $role = UserProject::where('user_id',auth()->user()->id)->where('project_id',$project_id)->first();
        $project = Project::where('id',$project_id)->first();
        $roleMenus = RoleMenu::where('role_id',$role->role_id)->get();
        session(['roleMenus' => $roleMenus]);
        return view('layouts.main')
        ->with(compact('project'));
    }

    public function project()
    {
        $user = User::where('id',auth()->user()->id)->first();
        $projects = UserProject::where('user_id',$user->id)->get();
        return view('layouts.project')
        ->with(compact('user'))
        ->with(compact('projects'));
    }

    public function menu(Request $request)
    {
        session(['current_project_id' => $request->project_id]);
        return redirect()->route('home');
    }
}
