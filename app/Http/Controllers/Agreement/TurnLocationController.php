<?php

namespace App\Http\Controllers;

use App\Models\TurnLocation;
use App\Models\Turn;
use App\Models\Location;
use App\Http\Requests\StoreTurnLocationRequest;
use Exception;


class TurnLocationController extends Controller
{
    public function index(Location $location)
    {
        return view('turnslocations.index', compact('location'));
    }

    public function create(Location $location)
    {
        if($location->turns->count()>0){
            $turns = Turn::select('turns.id as id','turns.name as name')->leftJoin('turn_locations','turns.id','=','turn_locations.turn_id')->whereNull('location_id')->get();
        }else{
            $turns = Turn::all();
        }
        return view('turnslocations.create')
        ->with('location',$location)
        ->with('turns',$turns);
    }

    public function store(StoreTurnLocationRequest $request, Location $location)
    {
        TurnLocation::create($request ->validated());
        return redirect()->route('turnsLocations.index',$location);
    }

    public function destroy(TurnLocation $turnlocation)
    {
        try{
            $location = $turnlocation->location;
            $turnlocation->delete();
            return redirect()->route('turnsLocations.index',$location);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
