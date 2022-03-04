<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unity;
use App\Imports\UnitiesImport;
use App\Http\Requests\Admin\StoreUnityRequest;
use App\Http\Requests\Admin\UpdateUnityRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Exception;

class UnityController extends Controller
{
    public function index()
    {
        $unities = Unity::get();
        return view('admin.unities.index', compact('unities'));
    }

    public function create()
    {
        return view('admin.unities.create');
    }

    public function store(StoreUnityRequest $request )
    {
        Unity::create($request ->validated());
        return redirect()->route('unities.index');
    }

    public function show(Unity $unity)
    {
        return view('admin.unities.show',[
            'unity'=>$unity
            ]);
    }

    public function edit(Unity $unity)
    {
        return view('admin.unities.edit',[
            'unity'=>$unity
            ]);
    }
    
    public function update(Unity $unity, UpdateUnityRequest $request)
    {
        try{
            $unity->update($request->validated());
            return redirect()->route('unities.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function destroy(Unity $unity)
    {
        try{
            $unity->delete();
            return redirect()->route('unities.index');
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    } 

    public function import(Request $request){
        try{
            if($request->hasFile('file')){
                $file = $request->file('file');
                Excel::import(new UnitiesImport,$file);
                return back()->with('success',__('messages.successfullImport'));
            }
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }
}
