<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Http\Requests\Admin\StoreOrganizationRequest;
use App\Http\Requests\Admin\UpdateOrganizationRequest;
use Exception;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::get();
        return view('admin.organizations.index', compact('organizations'));
    }

    public function create()
    {
        return view('admin.organizations.create');
    }

    public function store(StoreOrganizationRequest $request )
    {
        Organization::create($request ->validated());
        return redirect()->route('organizations.index');
    }

    public function show(Organization $organization)
    {
        return view('admin.organizations.show',[
            'organization'=>$organization
            ]);
    }

    public function edit(Organization $organization)
    {
        return view('admin.organizations.edit',[
            'organization'=>$organization
            ]);
    }
    
    public function update(Organization $organization, UpdateOrganizationRequest $request)
    {
        try{
            $organization->update($request->validated());
            return redirect()->route('organizations.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(Organization $organization)
    {
        try{
            $organization->delete();
            return redirect()->route('organizations.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    } 
}
