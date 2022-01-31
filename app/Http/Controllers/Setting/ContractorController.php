<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\StoreContractorRequest;
use App\Http\Requests\Setting\UpdateContractorRequest;
use App\Models\Contractor;
use App\Models\Project;
use Exception;

class ContractorController extends Controller
{
    public function index()
    {
        $contractors = Contractor::get();
        return view('setting.contractors.index', compact('contractors'));
    }

    public function create()
    {
        $project_id = session('current_project_id');
        $project = Project::where('id',$project_id)->first();
        return view('setting.contractors.create')
        ->with(compact('project'));
    }

    public function store(StoreContractorRequest $request )
    {
        try{
            Contractor::create($request ->validated());
            return redirect()->route('contractors.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function show(Contractor $contractor)
    {
        return view('setting.contractors.show',[
            'contractor'=>$contractor
            ]);
    }

    public function edit(Contractor $contractor)
    {
        return view('setting.contractors.edit',[
            'contractor'=>$contractor
            ]);
    }
    
    public function update(Contractor $contractor, UpdateContractorRequest $request)
    {
        try{
            $contractor->update($request->validated());
            return redirect()->route('contractors.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
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
