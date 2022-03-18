<?php

namespace App\Http\Controllers\Workbook;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Folio;
use App\Models\Location;
use App\Models\LocationProjectUser;
use App\Http\Requests\Workbook\StoreFolioRequest;
use App\Http\Requests\Workbook\UpdateFolioRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Exception;
use Font;

class FolioController extends Controller
{
    public function index($location_id = null)
    {
        if (empty($location_id)){
            $folios = Folio::select('folios.id as id','folios.location_id as location_id','locations.name as name','folios.date as date','folios.number as number')
                            ->join('location_project_users','folios.location_id','=','location_project_users.location_id')
                            ->join('locations','folios.location_id','=','locations.id')
                            ->where('location_project_users.project_user_id',current_user()->id)
                            ->where('folios.location_id',0)
                            ->get();
        }else{
            $folios = Folio::select('folios.id as id','folios.location_id as location_id','locations.name as name','folios.date as date','folios.number as number')
                            ->join('location_project_users','folios.location_id','=','location_project_users.location_id')
                            ->join('locations','folios.location_id','=','locations.id')
                            ->where('location_project_users.project_user_id',current_user()->id)
                            ->where('folios.location_id',$location_id)
                            ->get();
        }
        return view('workbooks.folios.index')
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
        $locationProjectUsers = LocationProjectUser::where('project_user_id',current_user()->id)->get();
        return view('workbooks.folios.create', compact('locationProjectUsers'));
    }

    public function store(StoreFolioRequest $request)
    {
        try{
            $location=Location::find($request->location_id);
            if (is_valid_date_for_project($request->date, $location->zone->project)){
                if (is_valid_date_for_location($request->date, $location)){
                    if (is_valid_date_for_open_folio($request->date, $location)){
                        Folio::create($request->validated());
                        $location->uploadSequence();
                        return redirect()->route('folios.index')->with('messages',__('messages.recordsuccessfullystored'));
                    }else{
                        return back()->withErrors(__('messages.timeexpiredtoOpen').' '.__('content.folio'));
                    }
                }else{
                    return back()->withErrors(__('messages.dateOutsideLocationExecution'));
                }
            }else{
                return back()->withErrors(__('messages.dateOutsideProjectExecution'));
            }
            
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
        
    }

    public function edit(Folio $folio)
    {
        return view('workbooks.folios.edit', compact('folio'));
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
        $pdf = PDF::loadView('agreement.folios.print',compact('folio'));
        
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
