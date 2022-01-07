<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Funct1on;
use App\Http\Requests\Admin\StoreFunctionRequest;
use App\Http\Requests\Admin\UpdateFunctionRequest;
use Exception;

class FunctionController extends Controller
{
    public function index()
    {
        $sectors = Funct1on::get();
        return view('admin.sectors.index', compact('sectors'));
    }

    public function create()
    {
        return view('admin.sectors.create');
    }

    public function store(StoreFunctionRequest $request )
    {
        Funct1on::create($request ->validated());
        return redirect()->route('sectors.index');
    }

    public function show(Funct1on $funct1on)
    {
        return view('admin.sectors.show',[
            'funct1on'=>$funct1on
            ]);
    }

    public function edit(Funct1on $funct1on)
    {
        return view('admin.sectors.edit',[
            'funct1on'=>$funct1on
            ]);
    }
    
    public function update(Funct1on $funct1on, UpdateFunctionRequest $request)
    {
        try{
            $funct1on->update($request->validated());
            return redirect()->route('sectors.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(Funct1on $funct1on)
    {
        try{
            $funct1on->delete();
            return redirect()->route('sectors.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    } 
}
