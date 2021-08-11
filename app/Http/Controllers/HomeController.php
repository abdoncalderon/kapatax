<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleMenu;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roleMenus = RoleMenu::where('role_id',auth()->user()->role()->id);
        return view('layouts.main');
    }
}
