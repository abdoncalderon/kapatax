<?php

namespace App\Http\Controllers\Workbook;

use App\Http\Controllers\Controller;
use App\Models\LocationTurn;
use App\Models\Turn;
use App\Models\Location;
use App\Http\Requests\Workbook\StoreLocationTurnRequest;
use Exception;

class LocationTurnController extends Controller
{
    public function index(Location $location)
    {
        return view('workbooks.locationTurns.index', compact('location'));
    }

    public function create(Location $location)
    {
        if($location->turns->count()>0){
            $turns = Turn::select('turns.*')->leftJoin('location_turns','turns.id','=','location_turns.turn_id')->whereNull('location_id')->where('turns.project_id',session('current_project_id'))->get();
        }else{
            $turns = Turn::where('turns.project_id',session('current_project_id'))->get();
        }
        return view('workbooks.locationTurns.create')
        ->with('location',$location)
        ->with('turns',$turns);
    }

    public function store(StoreLocationTurnRequest $request, Location $location)
    {
        try{
           
            if((is_valid_date_for_project($request->dateFrom,current_user()->project))&&(is_valid_date_for_project($request->dateTo,current_user()->project))){
                if((is_valid_date_for_location($request->dateFrom, $location))&&(is_valid_date_for_location($request->dateTo, $location))){
                    LocationTurn::create($request ->validated());
                    return redirect()->route('locationTurns.index',$location);
                }else{
                    return back()->withErrors(__('messages.dateOutsideLocationExecution'));
                }
            }else{
                return back()->withErrors(__('messages.dateOutsideProjectExecution'));
            }
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(LocationTurn $turnlocation)
    {
        try{
            $location = $turnlocation->location;
            $turnlocation->delete();
            return redirect()->route('locationTurns.index',$location);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
