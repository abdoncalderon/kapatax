<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::get();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(StoreMenuRequest $request )
    {
        Menu::create($request ->validated());
        return redirect()->route('menus.index');
    }

    public function show(Menu $menu)
    {
        return view('menus.show',[
            'menu'=>$menu
            ]);
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit',[
            'menu'=>$menu
            ]);
    }
    
    public function update(Menu $menu, UpdateMenuRequest $request)
    {
        $menu->update($request->validated());
        return redirect()->route('menus.index');
    }
}
