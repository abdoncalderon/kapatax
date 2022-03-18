<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Turn;
use App\Imports\TurnsImport;
use App\Http\Requests\Project\StoreTurnRequest;
use App\Http\Requests\Project\UpdateTurnRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class TurnController extends Controller
{
    public function index()
    {
        $turns = Turn::where('project_id',session('current_project_id'))->get();
        return view('project.turns.index', compact('turns'));
    }

    public function create()
    {
        return view('project.turns.create');
    }

    public function store(StoreTurnRequest $request )
    {
        try{
            $nextday = $request->has('nextday');
            $request ->validated();
            Turn::create([
                'name'=>$request->name,
                'start'=>$request->start,
                'finish'=>$request->finish,
                'nextday'=>$nextday,
                'project_id'=>session('current_project_id'),
            ]);
            return redirect()->route('turns.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
        
    }

    public function show(Turn $turn)
    {
        return view('project.turns.show',[
            'turn'=>$turn
            ]);
    }

    public function edit(Turn $turn)
    {
        return view('project.turns.edit',[
            'turn'=>$turn
            ]);
    }
    
    public function update(Turn $turn, UpdateTurnRequest $request)
    {
        try{
            $nextday = $request->has('nextday');
            $request->validated();
            $turn->update([
                'start'=>$request->start,
                'finish'=>$request->finish,
                'nextday'=>$nextday,
            ]);
            return redirect()->route('turns.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }

    public function destroy(Turn $turn)
    {
        try{
            $turn->delete();
            return redirect()->route('turns.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function import(Request $request){
        try{
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                Excel::import(new TurnsImport,$file);
                return back();
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
