<?php

namespace App\Http\Controllers\Agreement;

use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use App\Models\Folio;
use App\Models\Equipment;
use App\Models\Position;
use App\Models\LocationUser;
use App\Models\Location;
use App\Http\Requests\Agreement\StoreDailyReportRequest;
use App\Http\Requests\Agreement\UpdateDailyReportRequest;
use App\Mail\ReportCompleted;
use App\Models\Stakeholder;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Mail;

class DailyReportController extends Controller
{
    public function index($location_id = null)
    {
        if (empty($location_id)){
            $location = Location::find(1);
            $dailyReports = DailyReport::join('folios','daily_reports.folio_id','=','folios.id')
                                ->join('location_users','folios.location_id','=','location_users.location_id')
                                ->where('location_users.user_id',auth()->user()->id)
                                ->where('folios.location_id',0)
                                ->get();
        }else{
            $location = Location::find($location_id);
            $dailyReports = DailyReport::select('daily_reports.id as id','locations.name as location','folios.date as date','turns.name as turn','daily_reports.status as status')->join('folios','daily_reports.folio_id','=','folios.id')
                                ->join('location_users','folios.location_id','=','location_users.location_id')
                                ->join('locations','folios.location_id','=','locations.id')
                                ->join('turns','daily_reports.turn_id','=','turns.id')
                                ->where('location_users.user_id',auth()->user()->id)
                                ->where('folios.location_id',$location_id)
                                ->get();
        }
        return view('agreement.dailyreports.index')
        ->with(compact('dailyReports'))
        ->with(compact('location'));
    }

    public function filterLocation(Request $request)
    {
        $location_id = $request->location;
        return redirect()->route('dailyReports.index',$location_id);
    }

    public function create(Folio $folio)
    {
        $equipments = Equipment::all();
        $positions = Position::all();
        $responsibles = LocationUser::where('location_id',$folio->location_id)->where('dailyreport_approver',1)->get();
        return view('agreement.dailyreports.create')
        ->with('folio',$folio)
        ->with('equipments',$equipments)
        ->with('positions',$positions)
        ->with('responsibles',$responsibles);
    }


    public function store(StoreDailyReportRequest $request)
    {
        try{
            $folio=Folio::find($request->folio_id);
            $date = strtotime($folio->date);
            if (is_valid_date_for_create_dailyreport($date, $folio->location)){
                $dailyReport = DailyReport::create($request ->validated());
                return redirect()->route('dailyReports.edit',$dailyReport)->with('messages',__('messages.recordsuccessfullystored'));
            }else{
                return back()->withErrors(__('messages.timeexpiredtocreate').' '.__('content.dailyreport'));
            }
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function review(DailyReport $dailyReport){
        return view('agreement.dailyReports.review')
        ->with('dailyReport',$dailyReport);
    }

    public function show(DailyReport $dailyReport){
        return view('agreement.dailyReports.show')
        ->with('dailyReport',$dailyReport);
    }

    public function edit(DailyReport $dailyReport)
    {
        $stakeholders = Stakeholder::where('stakeholder_type_id',4)->get();
        $equipments = Equipment::all();
        $positions = Position::all();
        $oldDailyReports = DailyReport::select('daily_reports.id as old_daily_report_id', 'folios.date as date', 'turns.name as turn')
                                            ->join('folios','daily_reports.folio_id','=','folios.id')
                                            ->join('turns','daily_reports.turn_id','=','turns.id')
                                            ->where('folios.location_id',$dailyReport->folio->location_id)
                                            ->orderBy('date','desc')
                                            ->get();
        return view('agreement.dailyreports.edit')
        ->with('dailyReport',$dailyReport)
        ->with('stakeholders',$stakeholders)
        ->with('equipments',$equipments)
        ->with('positions',$positions)
        ->with('oldDailyReports',$oldDailyReports);
    }

    public function update(DailyReport $dailyReport, UpdateDailyReportRequest $request)
    {
        $dailyReport->update($request->validated());
        if (($request->status==1)||($request->status==2)){
            if ($request->status==1){
                $dailyReport->folio->update([
                    'signature_reviewer'=>auth()->user()->signature,
                ]);
            }else{
                $dailyReport->folio->update([
                    'signature_approver'=>auth()->user()->signature,
                ]);
            }
            $usersReceiveNotification = LocationUser::where('location_id',$dailyReport->folio->location_id)->where('receive_notification',1)->get();
                foreach ($usersReceiveNotification as $user){
                    Mail::to($user->user->email)->queue(new ReportCompleted($dailyReport));
                }
        }
        return redirect()->route('dailyReports.index',$dailyReport->folio->location->id);
    }
}
