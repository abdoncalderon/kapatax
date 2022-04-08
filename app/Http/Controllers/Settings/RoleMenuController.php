<?php

namespace App\Http\Controllers\Settings;

use App\Models\Role;
use App\Models\Menu;
use App\Models\RoleMenu;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\StoreRoleMenuRequest;
use Illuminate\Http\Request;
use Exception;

class RoleMenuController extends Controller
{
    public function index(Role $role)
    {
        $otherRoles = Role::where('id','!=',$role->id)->get();
        $roleMenus = RoleMenu::where('role_id',$role->id)->get();
        return view('settings.roleMenus.index', compact('role'))
        ->with(compact('roleMenus'))
        ->with(compact('otherRoles'));
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

        return view('settings.roleMenus.create')
        ->with('role',$role)
        ->with(compact('availablesMenus'));
    }

    public function store(StoreRoleMenuRequest $request, Role $role)
    {
        try{
            RoleMenu::create($request ->validated());
            return redirect()->route('roleMenus.index',$role);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
    
    
    public function destroy(RoleMenu $roleMenu)
    {
        try{
            $role = $roleMenu->role;
            $roleMenu->delete();
            return redirect()->route('roleMenus.index',$role);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function activate(RoleMenu $roleMenu, $value){
        try{
            $roleMenu->update([
                'isActive'=>$value,
            ]);
            $role = Role::where('id',$roleMenu->role_id)->first();
            return redirect()->route('roleMenus.index',$role);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function clone(Request $request){
        try{
            $roleSourceMenus=RoleMenu::where('role_id',$request->role_source_id)->get();
            $role = Role::find($request->role_target_id);
            foreach($roleSourceMenus as $roleSourceMenu){
                $roleTargetMenu = RoleMenu::where('role_id',$request->role_target_id)
                                ->where('menu_id',$roleSourceMenu->menu_id)
                                ->first();
                if ($roleTargetMenu != null){
                    $roleTargetMenu->update([
                        'isActive' => $roleSourceMenu->isActive,
                    ]);
                }
            }
            return redirect()->route('roleMenus.index',$role);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function setOpen(Request $request, $id)
    {
        if($request->ajax())
        {
            $roleMenus = RoleMenu::where('role_id',current_user()->role->id)->get();
            foreach ($roleMenus as $roleMenu){
            
                if($roleMenu->menu_id==$id){
                    $value = 1;
                }else{
                    $value = 0;
                }
                $roleMenu->update([
                    'isOpen' => $value,
                ]);

            }
            return response()->json($id);
        }
    }

    


}
