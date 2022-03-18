<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Subsidiary;
use App\Models\Division;
use App\Http\Requests\Settings\StoreSubsidiaryRequest;
use App\Http\Requests\Settings\UpdateSubsidiaryRequest;
use Exception;


class SubsidiaryController extends Controller
{
    public function index()
    {
        $subsidiaries = Subsidiary::get();
        return view('settings.subsidiaries.index', compact('subsidiaries'));
    }

    public function create()
    {
        $companies = Company::get();
        $divisions = Division::get();
        return view('settings.subsidiaries.create')
        ->with(compact('companies'))
        ->with(compact('divisions'));
    }

    public function store(StoreSubsidiaryRequest $request )
    {
        try{
            Subsidiary::create($request ->validated());
            return redirect()->route('subsidiaries.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function show(Subsidiary $subsidiary)
    {
        return view('settings.subsidiaries.show',[
            'subsidiary'=>$subsidiary
            ]);
    }

    public function edit(Subsidiary $subsidiary)
    {
        $companies = Company::get();
        $divisions = Division::get();
        return view('settings.subsidiaries.edit',[
            'subsidiary'=>$subsidiary
            ])
        ->with(compact('companies'))
        ->with(compact('divisions'));
    }
    
    public function update(Subsidiary $subsidiary, UpdateSubsidiaryRequest $request)
    {
        try{
            $subsidiary->update($request->validated());
            return redirect()->route('subsidiaries.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(Subsidiary $subsidiary)
    {
        try{
            $subsidiary->delete();
            return redirect()->route('subsidiaries.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }   
}
