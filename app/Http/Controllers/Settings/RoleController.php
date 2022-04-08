<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Requests\Settings\StoreRoleRequest;
use App\Http\Requests\Settings\UpdateRoleRequest;
use Exception;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('settings.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('settings.roles.create');
    }

    

    public function store(StoreRoleRequest $request )
    {
        try{
            $request->validated();
            $role = Role::create([
                'name' => $request['name'],
            ]);
            assign_permits_to_role($role);
            assign_menus_to_role($role);
            return redirect()->route('roles.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function show(Role $role)
    {
        return view('settings.roles.show',[
            'role'=>$role
            ]);
    }

    public function edit(Role $role)
    {
        return view('settings.roles.edit',[
            'role'=>$role
            ]);
    }
    
    public function update(Role $role, UpdateRoleRequest $request)
    {
        try{
            $role->update($request->validated());
            return redirect()->route('roles.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }

    public function activate(Role $role, $value){
        try{
            $role->update([
                'isActive'=>$value,
            ]);
            return redirect()->route('roles.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(Role $role)
    {
        try{
            $role->delete();
            return redirect()->route('roles.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    } 

    public function add(StoreRoleRequest $request )
    {
        try{
            Role::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    
    
}
