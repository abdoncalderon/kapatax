<?php

namespace App\Http\Controllers;

use App\Role;
use App\Http\Requests\SaveRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(SaveRoleRequest $request )
    {
        Role::create($request ->validated());
        return redirect()->route('roles.index');
    }

    public function show(Role $role)
    {
        return view('roles.show',[
            'role'=>$role
            ]);
    }

    public function edit(Role $role)
    {
        return view('roles.edit',[
            'role'=>$role
            ]);
    }
    
    public function update(Role $role, UpdateRoleRequest $request)
    {
        $role->update($request->validated());
        return redirect()->route('roles.index');
    }

}
