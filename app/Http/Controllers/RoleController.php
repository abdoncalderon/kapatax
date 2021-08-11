<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\Admin\StoreRoleRequest;
use App\Http\Requests\Admin\UpdateRoleRequest;

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
        Role::create($request ->validated());
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

}
