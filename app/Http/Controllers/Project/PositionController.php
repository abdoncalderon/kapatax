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
        $positions = Position::select('positions.id as id','positions.name as name')
                                ->join('funct1ons','positions.function_id','=','funct1ons.id')
                                ->where('funct1ons.project_id',session('current_project_id'))
                                ->get();
        return view('project.positions.index', compact('positions'));
    }

    public function create()
    {
        if(current_user()->project->functions->count()>0){
            $functions = Funct1on::select('funct1ons.id as id','funct1ons.name as name')
                                ->leftJoin('positions','funct1ons.id','=','positions.function_id')
                                ->where('project_id',session('current_project_id'))
                                ->whereNull('function_id')
                                ->get();
        }else{
            $functions = Funct1on::where('project_id',session('current_project_id'))
                                ->get();
        }
        return view('project.positions.create')
        ->with(compact('functions'));
    }

    public function store(StorePositionRequest $request )
    {
        Position::create($request ->validated());
        return redirect()->route('positions.index');
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
        $position->update($request->validated());
        return redirect()->route('positions.index');
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

    
}
