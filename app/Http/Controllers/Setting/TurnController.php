<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Turn;
use App\Http\Requests\Setting\StoreTurnRequest;
use App\Http\Requests\Setting\UpdateTurnRequest;
use Exception;

class TurnController extends Controller
{
    public function index()
    {
        $turns = Turn::get();
        return view('agreement.turns.index', compact('turns'));
    }

    public function create()
    {
        return view('agreement.turns.create');
    }

    public function store(StoreTurnRequest $request )
    {
        $nextday = $request->has('nextday');
        $request ->validated();
        Turn::create([
            'name'=>$request->name,
            'start'=>$request->start,
            'finish'=>$request->finish,
            'nextday'=>$nextday,
        ]);
        return redirect()->route('turns.index');
    }

    public function show(Turn $turn)
    {
        return view('agreement.turns.show',[
            'turn'=>$turn
            ]);
    }

    public function edit(Turn $turn)
    {
        return view('agreement.turns.edit',[
            'turn'=>$turn
            ]);
    }
    
    public function update(Turn $turn, UpdateTurnRequest $request)
    {
        $nextday = $request->has('nextday');
        $request->validated();
        $turn->update([
            'start'=>$request->start,
            'finish'=>$request->finish,
            'nextday'=>$nextday,
        ]);
        return redirect()->route('turns.index');
    }

    public function destroy(Turn $turn)
    {
        try{
            $turn->delete();
            return redirect()->route('turns.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
