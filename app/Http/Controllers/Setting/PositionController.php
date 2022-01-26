<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Http\Requests\Setting\StorePositionRequest;
use App\Http\Requests\Setting\UpdatePositionRequest;
use Exception;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::get();
        return view('setting.positions.index', compact('positions'));
    }

    public function create()
    {
        return view('setting.positions.create');
    }

    public function store(StorePositionRequest $request )
    {
        Position::create($request ->validated());
        return redirect()->route('positions.index');
    }

    public function show(Position $position)
    {
        return view('setting.positions.show',[
            'position'=>$position
            ]);
    }

    public function edit(Position $position)
    {
        return view('setting.positions.edit',[
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
