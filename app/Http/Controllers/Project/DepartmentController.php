<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Http\Requests\Admin\StoreDepartmentRequest;
use App\Http\Requests\Admin\UpdateDepartmentRequest;
use Exception;


class DepartmentController extends Controller
{
    public function index()
    {
        $deparments = Department::get();
        return view('projects.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('projects.departments.create');
    }

    public function store(StoreDepartmentRequest $request )
    {
        Department::create($request ->validated());
        return redirect()->route('departments.index');
    }

    public function show(Department $department)
    {
        return view('projects.departments.show',[
            'department'=>$department
            ]);
    }

    public function edit(Department $department)
    {
        return view('projects.departments.edit',[
            'department'=>$department
            ]);
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
}
