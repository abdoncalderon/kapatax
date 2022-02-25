<?php

namespace App\Http\Controllers\Agreement;

use App\Http\Controllers\Controller;
use App\Models\LocationTurn;
use App\Models\Turn;
use App\Models\Location;
use App\Http\Requests\Agreement\StoreLocationTurnRequest;
use Exception;

class LocationTurnController extends Controller
{
    public function index(Location $location)
    {
        return view('agreement.locationTurns.index', compact('location'));
    }

    public function create(Location $location)
    {
        if($location->turns->count()>0){
            $turns = Turn::select('turns.id as id','turns.name as name')->leftJoin('location_turns','turns.id','=','location_turns.turn_id')->whereNull('location_id')->get();
        }else{
            $turns = Turn::all();
        }
        return view('agreement.locationTurns.create')
        ->with('location',$location)
        ->with('turns',$turns);
    }

    public function store(StoreLocationTurnRequest $request, Location $location)
    {
        try{
            $dateFrom=strtotime($request->dateFrom);
            $dateTo=strtotime($request->dateTo);
            if((is_valid_date_for_location($dateFrom, $location))&&(is_valid_date_for_location($dateTo, $location))){
                LocationTurn::create($request ->validated());
                return redirect()->route('locationTurns.index',$location);
            }else{
                return back()->withErrors(__('messages.dateOutsideLocationExecution'));
            }
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }

    public function destroy(LocationTurn $turnlocation)
    {
        try{
            $location = $turnlocation->location;
            $turnlocation->delete();
            return redirect()->route('locationTurns.index',$location);
        }catch(Exception $e){
            return back()->withErrors(exception_code($e->errorInfo[0]));
        }
    }
}
