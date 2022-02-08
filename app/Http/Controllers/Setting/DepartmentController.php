<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\ProjectSector;
use App\Models\Sector;
use App\Http\Requests\Setting\StoreDepartmentRequest;
use App\Http\Requests\Setting\UpdateDepartmentRequest;

use Exception;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::get();
        return view('setting.departments.index', compact('departments'));
    }

    public function create()
    {
        if(current_user()->project->sectors->count()>0){
            $sectors = Sector::select('sectors.id as id','sectors.name as name')->leftJoin('project_sectors','sectors.id','=','project_sectors.sector_id')->whereNull('project_id')->get();
        }else{
            $sectors = Sector::all();
        }
        $projectSectors = ProjectSector::where('project_id',session('current_project_id'))->get();
        return view('setting.departments.create')
        ->with('projectSectors',$projectSectors)
        ->with('sectors',$sectors);
    }

    public function store(StoreDepartmentRequest $request )
    {
        try{
            Department::create($request ->validated());
            return redirect()->route('departments.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function show(Department $department)
    {
        return view('setting.departments.show',[
            'department'=>$department
            ]);
    }

    public function edit(Department $department)
    {
        if(current_user()->project->sectors->count()>0){
            $sectors = Sector::select('sectors.id as id','sectors.name as name')->leftJoin('project_sectors','sectors.id','=','project_sectors.sector_id')->whereNull('project_id')->get();
        }else{
            $sectors = Sector::all();
        }
        $projectSectors = ProjectSector::where('project_id',session('current_project_id'))->get();
        return view('setting.departments.edit',[
            'department'=>$department
            ])->with('projectSectors',$projectSectors)
            ->with('sectors',$sectors);
    }
    
    public function update(Department $department, UpdateDepartmentRequest $request)
    {
        try{
            $department->update($request->validated());
            return redirect()->route('departments.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(Department $department)
    {
        try{
            $department->delete();
            return redirect()->route('departments.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    } 

    public function add(StoreDepartmentRequest $request )
    {
        try{
            Department::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    
}
