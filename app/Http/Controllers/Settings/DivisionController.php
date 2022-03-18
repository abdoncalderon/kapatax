<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Http\Requests\Settings\StoreDivisionRequest;
use App\Http\Requests\Settings\UpdateDivisionRequest;
use Exception;


class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::get();
        return view('settings.divisions.index', compact('divisions'));
    }

    public function create()
    {
        return view('settings.divisions.create');
    }

    public function store(StoreDivisionRequest $request )
    {
        Division::create($request ->validated());
        return redirect()->route('divisions.index');
    }

    public function show(Division $division)
    {
        return view('settings.divisions.show',[
            'division'=>$division
            ]);
    }

    public function edit(Division $division)
    {
        return view('settings.divisions.edit',[
            'division'=>$division
            ]);
    }
    
    public function update(Division $division, UpdateDivisionRequest $request)
    {
        try{
            $division->update($request->validated());
            return redirect()->route('divisions.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(Division $division)
    {
        try{
            $division->delete();
            return redirect()->route('divisions.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }  

    public function add(StoreDivisionRequest $request )
    {
        try{
            Division::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

}
