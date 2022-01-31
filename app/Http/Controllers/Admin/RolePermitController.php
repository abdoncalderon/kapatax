<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permit;
use App\Models\RolePermit;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolePermitRequest;
use Exception;

class RolePermitController extends Controller
{
    public function index(Role $role)
    {
        $rolePermits = RolePermit::where('role_id',$role->id)->get();
        return view('admin.rolePermits.index', compact('role'))
        ->with(compact('rolePermits'));
    }

    public function create(Role $role)
    {
        $myPermits = $role->permits;
        $permits = Permit::get();
        $availablesPermits = [];
        foreach ($permits as $permit){
            $exist = false;
            foreach($myPermits as $myPermit)
            {
                if($permit->id==$myPermit->permit_id){
                    $exist = true;
                    break;
                }
            }
            if (!$exist){
                array_push($availablesPermits,$permit);
            }
        }
        $permits = RolePermit::where('role_id','!=',$role->id);

        return view('admin.rolePermits.create')
        ->with('role',$role)
        ->with(compact('availablesPermits'));
    }

    public function store(StoreRolePermitRequest $request, Role $role)
    {
        try{
            RolePermit::create($request ->validated());
            return redirect()->route('rolePermits.index',$role);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
    
    
    public function destroy(RolePermit $rolePermit)
    {
        try{
            $role = $rolePermit->role;
            $rolePermit->delete();
            return redirect()->route('rolePermits.index',$role);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function activate(RolePermit $rolePermit, $value){
        try{
            $rolePermit->update([
                'isActive'=>$value,
            ]);
            $role = Role::where('id',$rolePermit->role_id)->first();
            return redirect()->route('rolePermits.index',$role);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
