<?php

namespace App\Http\Controllers\Admin;


use App\Models\Menu;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMenuRequest;
use App\Http\Requests\Admin\UpdateMenuRequest;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::get();
        return view('admin.menus.index', compact('menus'));
    }
 
    public function create()
    {
        $menus = Menu::get();
        return view('admin.menus.create', compact('menus'));
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
        $fathers = Menu::where('id','!=',$menu->id)->get();
        return view('admin.menus.edit',[
            'menu'=>$menu
            ])->with(compact('fathers'));
    }
    
    public function update(Menu $menu, UpdateMenuRequest $request)
    {
        $menu->update($request->validated());
        return redirect()->route('menus.index');
    }
}
