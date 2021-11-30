<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Http\Requests\Admin\StorePositionRequest;
use App\Http\Requests\Admin\UpdatePositionRequest;
use Exception;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::get();
        return view('admin.positions.index', compact('positions'));
    }

    public function create()
    {
        return view('admin.positions.create');
    }

    public function store(StorePositionRequest $request )
    {
        Position::create($request ->validated());
        return redirect()->route('positions.index');
    }

    public function show(Position $position)
    {
        return view('admin.positions.show',[
            'position'=>$position
            ]);
    }

    public function edit(Position $position)
    {
        return view('admin.positions.edit',[
            'position'=>$position
            ]);
    }
    
    public function update(Position $position, UpdatePositionRequest $request)
    {
        $position->update($request->validated());
        return redirect()->route('positions.index');
    }

    public function destroy(Position $position)
    {
        try{
            $position->delete();
            return redirect()->route('positions.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
