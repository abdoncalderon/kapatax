<?php

namespace App\Http\Controllers\Workbook;

use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use App\Models\Folio;
use App\Models\Equipment;
use App\Models\Position;
use App\Models\LocationProjectUser;
use App\Models\Location;
use App\Http\Requests\Workbook\StoreDailyReportRequest;
use App\Http\Requests\Workbook\UpdateDailyReportRequest;
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
                                ->join('location_project_users','folios.location_id','=','location_project_users.location_id')
                                ->where('location_project_users.project_user_id',current_user()->id)
                                ->where('folios.location_id',0)
                                ->get();
        }else{
            $location = Location::find($location_id);
            $dailyReports = DailyReport::select('daily_reports.id as id','locations.name as location','folios.date as date','turns.name as turn','daily_reports.status as status')->join('folios','daily_reports.folio_id','=','folios.id')
                                ->join('location_project_users','folios.location_id','=','location_project_users.location_id')
                                ->join('locations','folios.location_id','=','locations.id')
                                ->join('turns','daily_reports.turn_id','=','turns.id')
                                ->where('location_project_users.project_user_id',current_user()->id)
                                ->where('folios.location_id',$location_id)
                                ->get();
        }
        return view('workbooks.dailyreports.index')
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
        $equipments = Equipment::where('project_id',session('current_project_id'))->get();
        $positions = Position::select('positions.*')->join('funct1ons','positions.function_id','=','funct1ons.id')->where('funct1ons.project_id',session('current_project_id'))->get();
        $responsibles = LocationProjectUser::where('location_id',$folio->location_id)->where('dailyreport_approver',1)->get();
        return view('workbooks.dailyreports.create')
        ->with('folio',$folio)
        ->with('equipments',$equipments)
        ->with('positions',$positions)
        ->with('responsibles',$responsibles);
    }


    public function store(StoreDailyReportRequest $request)
    {
        try{
            $folio=Folio::find($request->folio_id);
            if (is_valid_date_for_create_dailyreport($folio->date, $folio->location)){
                $dailyReport = DailyReport::create($request ->validated());
                return redirect()->route('dailyReports.edit',$dailyReport)->with('success',__('messages.recordsuccessfullystored'));
            }else{
                return back()->withErrors(__('messages.timeexpiredtocreate').' '.__('content.dailyreport'));
            }
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function review(DailyReport $dailyReport){
        return view('workbooks.dailyReports.review')
        ->with('dailyReport',$dailyReport);
    }

    public function show(DailyReport $dailyReport){
        return view('workbooks.dailyReports.show')
        ->with('dailyReport',$dailyReport);
    }

    public function edit(DailyReport $dailyReport)
    {
        $stakeholders = Stakeholder::where('project_id',session('current_project_id'))->get();
        $equipments = Equipment::where('project_id',session('current_project_id'))->get();
        $positions = Position::select('positions.*')->join('funct1ons','positions.function_id','=','funct1ons.id')->where('funct1ons.project_id',session('current_project_id'))->get();
        $oldDailyReports = DailyReport::select('daily_reports.id as old_daily_report_id', 'folios.date as date', 'turns.name as turn')
                                            ->join('folios','daily_reports.folio_id','=','folios.id')
                                            ->join('turns','daily_reports.turn_id','=','turns.id')
                                            ->where('folios.location_id',$dailyReport->folio->location_id)
                                            ->where('daily_reports.id','!=',$dailyReport->id)
                                            ->orderBy('date','desc')
                                            ->get();
        return view('workbooks.dailyreports.edit')
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
            $signature = current_user()->user->person->signature;
            $folio = $dailyReport->folio;
            if ($request->status==1){
                $folio->update([
                    'signature_reviewer'=>$signature,
                ]);
            }else{
                $folio->update([
                    'signature_approver'=>$signature,
                ]);
            }
            $locationProjectUsersReceiveNotification = LocationProjectUser::where('location_id',$dailyReport->folio->location_id)->where('receive_notification',1)->get();
                foreach ($locationProjectUsersReceiveNotification as $locationProjectUser){
                    Mail::to($locationProjectUser->projectUser->user->email)->queue(new ReportCompleted($dailyReport));
                }
        }
        return redirect()->route('dailyReports.index',$dailyReport->folio->location->id);
    }
}
