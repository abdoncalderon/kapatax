<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Http\Requests\Settings\StoreOrganizationRequest;
use App\Http\Requests\Settings\UpdateOrganizationRequest;
use Exception;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::get();
        return view('settings.organizations.index', compact('organizations'));
    }

    public function create()
    {
        return view('settings.organizations.create');
    }

    public function store(StoreOrganizationRequest $request )
    {
        Organization::create($request ->validated());
        return redirect()->route('organizations.index');
    }

    public function show(Organization $organization)
    {
        return view('settings.organizations.show',[
            'organization'=>$organization
            ]);
    }

    public function edit(Organization $organization)
    {
        return view('settings.organizations.edit',[
            'organization'=>$organization
            ]);
    }
    
    public function update(Organization $organization, UpdateOrganizationRequest $request)
    {
        try{
            $organization->update($request->validated());
            return redirect()->route('organizations.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(Organization $organization)
    {
        try{
            $organization->delete();
            return redirect()->route('organizations.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    } 
}
