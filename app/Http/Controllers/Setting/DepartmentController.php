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
        $departments = Department::select('departments.id as id','departments.name as name','sectors.name as sector')
                                    ->join('sectors','departments.sector_id','=','sectors.id')
                                    ->where('sectors.project_id',session('current_project_id'))
                                    ->get();
        return view('setting.departments.index', compact('departments'));
    }

    public function create()
    {
        if(current_user()->project->sectors->count()>0){
            $sectors = Sector::select('sectors.id as id','sectors.name as name')
                                ->leftJoin('departments','sectors.id','=','departments.sector_id')
                                ->where('project_id',session('current_project_id'))
                                ->whereNull('sector_id')
                                ->get();
        }else{
            $sectors = Sector::where('project_id',session('current_project_id'))
                                ->get();
        }
        return view('setting.departments.create')
        ->with('sectors',$sectors);
    }

    public function store(StoreDepartmentRequest $request )
    {
        try{
            Department::create($request ->validated());
            return redirect()->route('departments.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
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
        $sectors = Sector::where('project_id',session('current_project_id'))->get();
        return view('setting.departments.edit',[
            'department'=>$department
            ])->with('sectors',$sectors);
    }
    
    public function update(Department $department, UpdateDepartmentRequest $request)
    {
        try{
            $department->update($request->validated());
            return redirect()->route('departments.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function destroy(Department $department)
    {
        try{
            $department->delete();
            return redirect()->route('departments.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    } 

    public function add(StoreDepartmentRequest $request )
    {
        try{
            Department::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    
}
