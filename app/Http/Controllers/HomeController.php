<?php

namespace App\Http\Controllers;

use App\Models\ProjectUser;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RoleMenu;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');

        /* $this->middleware('auth');
        $this->middleware(function ($request, $next) {
        $this->user = Auth::user();
        return $next($request); */
    }

        
    
    public function index()
    {
        $project_id = session('current_project_id');
        $role = ProjectUser::where('user_id',auth()->user()->id)->where('project_id',$project_id)->first();
        $project = Project::where('id',$project_id)->first();
        $roleMenus = RoleMenu::where('role_id',$role->role_id)->where('isActive','1')->get();
        session(['roleMenus' => $roleMenus]);
        return view('layouts.main')
        ->with(compact('project'));
    }

    public function project()
    {
        $user = User::where('id',auth()->user()->id)->first();
        $projectUsers = ProjectUser::where('user_id',$user->id)->get();
        return view('layouts.project')
        ->with(compact('user'))
        ->with(compact('projectUsers'));
    }

    public function menu(Request $request)
    {
        session(['current_project_id' => $request->project_id]);
        return redirect()->route('home');
    }
}
