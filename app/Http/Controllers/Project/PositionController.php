<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Http\Requests\Project\StorePositionRequest;
use App\Http\Requests\Project\UpdatePositionRequest;
use App\Models\Funct1on;

use Exception;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::select('positions.*')
                                ->join('funct1ons','positions.function_id','=','funct1ons.id')
                                ->where('funct1ons.project_id',session('current_project_id'))
                                ->get();
        return view('project.positions.index', compact('positions'));
    }

    public function create()
    {
        $functions = Funct1on::where('project_id',current_user()->project_id)->get();
        return view('project.positions.create')
        ->with(compact('functions'));
    }

    public function store(StorePositionRequest $request)
    {
        try{
            Position::create($request ->validated());
            return redirect()->route('positions.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }

    public function show(Position $position)
    {
        return view('project.positions.show',[
            'position'=>$position
            ]);
    }

    public function edit(Position $position)
    {
        $functions = Funct1on::where('project_id',session('current_project_id'))->get();
        return view('project.positions.edit',[
            'position'=>$position
            ])->with(compact('functions'));
    }
    
    public function update(Position $position, UpdatePositionRequest $request)
    {
        try{
            $position->update($request->validated());
            return redirect()->route('positions.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }

    public function destroy(Position $position)
    {
        try{
            $position->delete();
            return redirect()->route('positions.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function add(StorePositionRequest $request)
    {
        try{
            Position::create($request ->validated());
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
    
}
