<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Subsidiary;
use App\Models\Division;
use App\Http\Requests\Admin\StoreSubsidiaryRequest;
use App\Http\Requests\Admin\UpdateSubsidiaryRequest;
use Exception;


class SubsidiaryController extends Controller
{
    public function index()
    {
        $subsidiaries = Subsidiary::get();
        return view('admin.subsidiaries.index', compact('subsidiaries'));
    }

    public function create()
    {
        $companies = Company::get();
        $divisions = Division::get();
        return view('admin.subsidiaries.create')
        ->with(compact('companies'))
        ->with(compact('divisions'));
    }

    public function store(StoreSubsidiaryRequest $request )
    {
        try{
            Subsidiary::create($request ->validated());
            return redirect()->route('subsidiaries.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function show(Subsidiary $subsidiary)
    {
        return view('admin.subsidiaries.show',[
            'subsidiary'=>$subsidiary
            ]);
    }

    public function edit(Subsidiary $subsidiary)
    {
        $companies = Company::get();
        $divisions = Division::get();
        return view('admin.subsidiaries.edit',[
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
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function destroy(Subsidiary $subsidiary)
    {
        try{
            $subsidiary->delete();
            return redirect()->route('subsidiaries.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }   
}
