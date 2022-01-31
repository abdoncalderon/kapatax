<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Department;
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
        return view('setting.departments.create');
    }

    public function store(StoreDepartmentRequest $request )
    {
        Department::create($request ->validated());
        return redirect()->route('departments.index');
    }

    public function show(Department $department)
    {
        return view('setting.departments.show',[
            'department'=>$department
            ]);
    }

    public function edit(Department $department)
    {
        return view('setting.departments.edit',[
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
