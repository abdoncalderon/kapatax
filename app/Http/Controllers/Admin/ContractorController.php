<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContractorRequest;
use App\Http\Requests\UpdateContractorRequest;
use App\Models\Contractor;
use Exception;

class ContractorController extends Controller
{
    public function index()
    {
        $contractors = Contractor::get();
        return view('admin.contractors.index', compact('contractors'));
    }

    public function create()
    {
        return view('admin.contractors.create');
    }

    public function store(StoreContractorRequest $request )
    {
        Contractor::create($request ->validated());
        return redirect()->route('contractors.index');
    }

    public function show(Contractor $contractor)
    {
        return view('admin.contractors.show',[
            'contractor'=>$contractor
            ]);
    }

    public function edit(Contractor $contractor)
    {
        return view('admin.contractors.edit',[
            'contractor'=>$contractor
            ]);
    }
    
    public function update(Contractor $contractor, UpdateContractorRequest $request)
    {
        $contractor->update($request->validated());
        return redirect()->route('contractors.index');
    }

    public function destroy(Contractor $contractor)
    {
        try{
            $contractor->delete();
            return redirect()->route('contractors.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
