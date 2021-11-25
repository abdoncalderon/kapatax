<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Menu;
use App\Models\RoleMenu;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoleMenuRequest;
use Exception;

class RoleMenuController extends Controller
{
    public function index(Role $role)
    {
        $roleMenus = RoleMenu::where('role_id',$role->id)->get();
        return view('admin.roleMenus.index', compact('role'))
        ->with(compact('roleMenus'));
    }

    public function create(Role $role)
    {
        $myMenus = $role->menus;
        $menus = Menu::get();
        $availablesMenus = [];
        foreach ($menus as $menu){
            $exist = false;
            foreach($myMenus as $myMenu)
            {
                if($menu->id==$myMenu->menu_id){
                    $exist = true;
                    break;
                }
            }
            if (!$exist){
                array_push($availablesMenus,$menu);
            }
        }
        $menus = RoleMenu::where('role_id','!=',$role->id);

        return view('admin.roleMenus.create')
        ->with('role',$role)
        ->with(compact('availablesMenus'));
    }

    public function store(StoreRoleMenuRequest $request, Role $role)
    {
        try{
            RoleMenu::create($request ->validated());
            return redirect()->route('roleMenus.index',$role);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
    
    
    public function destroy(RoleMenu $roleMenu)
    {
        try{
            $role = $roleMenu->role;
            $roleMenu->delete();
            return redirect()->route('roleMenus.index',$role);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
