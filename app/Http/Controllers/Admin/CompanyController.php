<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Requests\Admin\StoreCompanyRequest;
use App\Http\Requests\Admin\UpdateCompanyRequest;

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
        $company->update($request->validated());
        return redirect()->route('companies.index');
    }
}
