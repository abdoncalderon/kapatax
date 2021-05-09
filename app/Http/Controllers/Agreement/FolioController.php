<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Folio;
use App\Models\Location;
use App\Models\LocationUser;
use App\Http\Requests\StoreFolioRequest;
use App\Http\Requests\UpdateFolioRequest;
use Illuminate\Http\Request;
use Exception;
use Barryvdh\DomPDF\Facade as PDF;
use Font;
// use Faker\Provider\ar_JO\Company;

class FolioController extends Controller
{
    public function index($location_id = null)
    {
        if (empty($location_id)){
            $folios = Folio::select('folios.id as id','folios.location_id as location_id','locations.name as name','folios.date as date','folios.number as number')
                            ->join('location_users','folios.location_id','=','location_users.location_id')
                            ->join('locations','folios.location_id','=','locations.id')
                            ->where('location_users.user_id',auth()->user()->id)
                            ->where('folios.location_id',0)
                            ->get();
        }else{
            $folios = Folio::select('folios.id as id','folios.location_id as location_id','locations.name as name','folios.date as date','folios.number as number')
                            ->join('location_users','folios.location_id','=','location_users.location_id')
                            ->join('locations','folios.location_id','=','locations.id')
                            ->where('location_users.user_id',auth()->user()->id)
                            ->where('folios.location_id',$location_id)
                            ->get();
        }
        return view('folios.index')
        ->with(compact('folios'))
        ->with(compact('location_id'));
    }

    public function filterLocation(Request $request)
    {
        $location_id = $request->location;
        return redirect()->route('folios.index',$location_id);
    }

    public function create()
    {
        $locationsUser = LocationUser::where('user_id',auth()->user()->id)->get();
        return view('folios.create', compact('locationsUser'));
    }

    public function store(StoreFolioRequest $request)
    {
        try{
            $location=Location::find($request->location_id);
            $date = strtotime($request->date);
            $today = strtotime(Carbon::today()->toDateString());
            $differenceInHours = abs(round(($date - $today)/60/60,0));
            if (($differenceInHours <= $location->max_time_open_folio)){
                Folio::create($request ->validated());
                $location->uploadSequence();
                return redirect()->route('folios.index')->with('messages',__('messages.recordsuccessfullystored'));
            }else{
                return back()->withErrors(__('messages.timeexpiredtoOpen').' '.__('content.folio'));
            }
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
        
    }

    public function edit(Folio $folio)
    {
        return view('folios.edit', compact('folio'));
    }

    public function update(UpdateFolioRequest $request, Folio $folio)
    {
        $folio->update([
            'number'=>$request->number,
        ]);
        return redirect()->route('folios.index');
    }

    public function print(Folio $folio)
    {
        // return view('folios.print1',compact('folio'));
        
        $pdf = PDF::loadView('folios.print',compact('folio'));
        
        // $pdf->page_text(72, 18, "Footer: {PAGE_NUM} of {PAGE_COUNT}", , 6, array(0,0,0));
        return $pdf->stream('folio.pdf');

    }

    public function getNumber(Request $request, $id)
    {
        if($request->ajax())
        {
            $location = Location::where('id',$id)->get();
            return response()->json($location);
        }
    }
}
