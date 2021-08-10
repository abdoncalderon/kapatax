<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $users = Menu::get();
        return view('admin.user.index', compact('users'));
    }
 
    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(StoreMenuRequest $request )
    {
        Menu::create($request ->validated());
        return redirect()->route('menus.index');
    }

    public function show(Menu $menu)
    {
        return view('admin.menus.show',[
            'menu'=>$menu
            ]);
    }

    public function edit(Menu $menu)
    {
        return view('admin.menus.edit',[
            'menu'=>$menu
            ]);
    }
    
    public function update(Menu $menu, UpdateMenuRequest $request)
    {
        $menu->update($request->validated());
        return redirect()->route('menus.index');
    }
}
