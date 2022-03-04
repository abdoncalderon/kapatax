<?php

namespace App\Http\Controllers;

use App\Models\ProjectUser;
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
        $roleMenus = RoleMenu::where('role_id',current_user()->projectRole->role->id)->where('isActive','1')->get();
        session(['roleMenus' => $roleMenus]);
        return view('layouts.main');
    }

    public function project()
    {
        $userProjects = ProjectUser::where('user_id',auth()->user()->id)->get();
        return view('layouts.project')
        ->with(compact('userProjects'));
    }

    public function menu(Request $request)
    {
        session(['current_project_id' => $request->project_id]);
        return redirect()->route('home');
    }
}
