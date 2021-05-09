<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use App\Http\Requests\StoreContractorRequest;
use App\Http\Requests\UpdateContractorRequest;
use Exception;

class ContractorController extends Controller
{
    public function index()
    {
        $contractors = Contractor::get();
        return view('contractors.index', compact('contractors'));
    }

    public function create()
    {
        return view('contractors.create');
    }

    public function store(StoreContractorRequest $request )
    {
        Contractor::create($request ->validated());
        return redirect()->route('contractors.index');
    }

    public function show(Contractor $contractor)
    {
        return view('contractors.show',[
            'contractor'=>$contractor
            ]);
    }

    public function edit(Contractor $contractor)
    {
        return view('contractors.edit',[
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
