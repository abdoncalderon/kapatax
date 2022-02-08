<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\ProjectSector;
use App\Models\Sector;
use App\Http\Requests\Setting\StorePositionRequest;
use App\Http\Requests\Setting\UpdatePositionRequest;
use App\Models\Funct1on;
use App\Models\ProjectFunction;

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
        $projectSectors = ProjectSector::where('project_id',session('current_project_id'))->get();
        $projectFunctions = ProjectFunction::where('project_id',session('current_project_id'))->get();
        if(current_user()->project->sectors->count()>0){
            $sectors = Sector::select('sectors.id as id','sectors.name as name')->leftJoin('project_sectors','sectors.id','=','project_sectors.sector_id')->whereNull('project_id')->get();
        }else{
            $sectors = Sector::all();
        }
        if(current_user()->project->functions->count()>0){
            $functions = Funct1on::select('funct1ons.id as id','funct1ons.name as name')->leftJoin('project_functions','funct1ons.id','=','project_functions.funct1on_id')->whereNull('project_id')->get();
        }else{
            $functions = Funct1on::all();
        }
        return view('setting.positions.create')
        ->with(compact('projectFunctions'))
        ->with(compact('projectSectors'))
        ->with(compact('functions'))
        ->with(compact('sectors'));
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
        $projectSectors = ProjectSector::where('project_id',session('current_project_id'))->get();
        $projectFunctions = ProjectFunction::where('project_id',session('current_project_id'))->get();
        if(current_user()->project->sectors->count()>0){
            $sectors = Sector::select('sectors.id as id','sectors.name as name')->leftJoin('project_sectors','sectors.id','=','project_sectors.sector_id')->whereNull('project_id')->get();
        }else{
            $sectors = Sector::all();
        }
        if(current_user()->project->functions->count()>0){
            $functions = Funct1on::select('funct1ons.id as id','funct1ons.name as name')->leftJoin('project_functions','funct1ons.id','=','project_functions.funct1on_id')->whereNull('project_id')->get();
        }else{
            $functions = Funct1on::all();
        }
        return view('setting.positions.edit',[
            'position'=>$position
            ])->with(compact('projectFunctions'))
            ->with(compact('projectSectors'))
            ->with(compact('functions'))
            ->with(compact('sectors'));
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
