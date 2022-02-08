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
        $functions = Funct1on::get();
        return view('admin.functions.index', compact('functions'));
    }

    public function create()
    {
        return view('admin.functions.create');
    }

    public function store(StoreFunctionRequest $request )
    {
        Funct1on::create($request ->validated());
        return redirect()->route('functions.index');
    }

    public function show(Funct1on $function)
    {
        return view('admin.functions.show',[
            'function'=>$function
            ]);
    }

    public function edit(Funct1on $function)
    {
        return view('admin.functions.edit',[
            'function'=>$function
            ]);
    }
    
    public function update(Funct1on $funct1on, UpdateFunctionRequest $request)
    {
        try{
            $funct1on->update($request->validated());
            return redirect()->route('functions.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(Funct1on $funct1on)
    {
        try{
            $funct1on->delete();
            return redirect()->route('functions.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    } 
}
