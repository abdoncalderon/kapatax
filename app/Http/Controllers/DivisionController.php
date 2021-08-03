<?php

namespace App\Http\Controllers;

use App\Division;
use App\Http\Requests\StoreDivisionRequest;
use App\Http\Requests\UpdateDivisionRequest;
use Illuminate\Http\Request;

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
        $division->update($request->validated());
        return redirect()->route('divisions.index');
    }
}
