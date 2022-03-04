<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Family;
use App\Models\Project;
use App\Imports\FamiliesImport;
use App\Http\Requests\Setting\StoreFamilyRequest;
use App\Http\Requests\Setting\UpdateFamilyRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class FamilyController extends Controller
{
    public function index()
    {
        $families = Family::where('project_id',session('current_project_id'))->get();
        return view('setting.families.index', compact('families'));
    }

    public function create()
    {
        $project = Project::where('id',session('current_project_id'))->first();
        return view('setting.families.create')
        ->with(compact('project'));
    }

    public function store(StoreFamilyRequest $request )
    {
        try{
            Family::create($request ->validated());
            return redirect()->route('families.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function show(Family $family)
    {
        return view('setting.families.show',[
            'function'=>$family
            ]);
    }

    public function edit(Family $family)
    {
        $project = Project::where('id',session('current_project_id'))->first();
        return view('setting.families.edit',[
            'function'=>$family
            ])->with(compact('project'));
    }
    
    public function update(Family $family, UpdateFamilyRequest $request)
    {
        try{
            $family->update($request->validated());
            return redirect()->route('families.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function destroy(Family $family)
    {
        try{
            $family->delete();
            return redirect()->route('families.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    } 

    public function import(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                Excel::import(new FamiliesImport,$file);
                return back();
            }
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function add(StoreFamilyRequest $request )
    {
        try{
            Family::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
