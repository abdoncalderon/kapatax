<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Http\Requests\Admin\StoreDivisionRequest;
use App\Http\Requests\Admin\UpdateDivisionRequest;
use Exception;


class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::get();
        return view('admin.divisions.index', compact('divisions'));
    }

    public function create()
    {
        return view('admin.divisions.create');
    }

    public function store(StoreDivisionRequest $request )
    {
        Division::create($request ->validated());
        return redirect()->route('divisions.index');
    }

    public function show(Division $division)
    {
        return view('admin.divisions.show',[
            'division'=>$division
            ]);
    }

    public function edit(Division $division)
    {
        return view('admin.divisions.edit',[
            'division'=>$division
            ]);
    }
    
    public function update(Division $division, UpdateDivisionRequest $request)
    {
        try{
            $division->update($request->validated());
            return redirect()->route('divisions.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function destroy(Division $division)
    {
        try{
            $division->delete();
            return redirect()->route('divisions.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }  

    public function add(StoreDivisionRequest $request )
    {
        try{
            Division::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

}
