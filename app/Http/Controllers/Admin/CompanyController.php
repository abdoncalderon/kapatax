<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Requests\Admin\StoreCompanyRequest;
use App\Http\Requests\Admin\UpdateCompanyRequest;
use Exception;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::get();
        return view('admin.companies.index', compact('companies'));
    }

    public function create()
    {
        return view('admin.companies.create');
    }

    public function store(StoreCompanyRequest $request )
    {
        Company::create($request ->validated()); 
        return redirect()->route('companies.index');
    }

    public function show(Company $company)
    {
        return view('admin.companies.show',[
            'company'=>$company
            ]);
    }

    public function edit(Company $company)
    {
        return view('admin.companies.edit',[
            'company'=>$company
            ]);
    }
    
    public function update(Company $company, UpdateCompanyRequest $request)
    {
        try{
            $company->update($request->validated());
            return redirect()->route('companies.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
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
}
