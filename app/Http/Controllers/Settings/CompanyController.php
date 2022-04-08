<?php

namespace App\Http\Controllers\Settings;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Requests\Settings\StoreCompanyRequest;
use App\Http\Requests\Settings\UpdateCompanyRequest;
use Exception;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::get();
        return view('settings.companies.index', compact('companies'));
    }

    public function create()
    {
        return view('settings.companies.create');
    }

    public function store(StoreCompanyRequest $request )
    {
        try{
            Company::create($request ->validated()); 
            return redirect()->route('companies.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
    
    public function edit(Company $company)
    {
        return view('settings.companies.edit',[
            'company'=>$company
            ]);
    }
    
    public function update(Company $company, UpdateCompanyRequest $request)
    {
        try{
            $company->update($request->validated());
            return redirect()->route('companies.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function activate(Company $company, $value){
        $company->update([
            'isActive'=>$value,
        ]);
        return redirect()->route('companies.index');

    }

    public function lock(Company $company, $value){
        $company->update([
            'isLocked'=>$value,
        ]);
        return redirect()->route('companies.index');
    }

    public function destroy(Company $company)
    {
        try{
            $company->delete();
            return redirect()->route('companies.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    } 
    
    public function add(StoreCompanyRequest $request )
    {
        try{
            Company::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
