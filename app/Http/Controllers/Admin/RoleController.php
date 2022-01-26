<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permit;
use App\Models\RolePermits;
use App\Http\Requests\Admin\StoreRoleRequest;
use App\Http\Requests\Admin\UpdateRoleRequest;
use App\Models\RolePermit;
use Exception;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(StoreRoleRequest $request )
    {
        // Role::create($request ->validated());
        $request ->validated();
        $role = Role::created([
            'name' => $request['name'],
        ]);
        assignPermitsToRole($role);
        return redirect()->route('roles.index');
    }

    public function show(Role $role)
    {
        return view('admin.roles.show',[
            'role'=>$role
            ]);
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit',[
            'role'=>$role
            ]);
    }
    
    public function update(Role $role, UpdateRoleRequest $request)
    {
        $role->update($request->validated());
        return redirect()->route('roles.index');
    }

    public function activate(Role $role, $value){
        $role->update([
            'isActive'=>$value,
        ]);
        return redirect()->route('roles.index');

    }

    public function destroy(Role $role)
    {
        try{
            $role->delete();
            return redirect()->route('roles.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    } 

    private function assignPermitsToRole(Role $role){
        $permits = Permit::all();
        foreach ($permits as $permit){
            $rolePermit = RolePermit::created([
                'role_id' => $role->id,
                'permit_id' => $permit->id,
            ]);
        }

    }
}
