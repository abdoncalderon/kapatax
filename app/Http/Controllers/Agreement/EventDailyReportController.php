<?php

namespace App\Http\Controllers\Agreement;

use App\Http\Controllers\Controller;
use App\Models\EventDailyReport;
use App\Models\DailyReport;
use App\Http\Requests\Agreement\StoreEventDailyReportRequest;
use Exception;

class EventDailyReportController extends Controller
{
    public function store(StoreEventDailyReportRequest $request){
        try{
            $haveImpact=$request->has('haveImpact');
            $request ->validated();
            EventDailyReport::create([
                'daily_report_id'=>$request->daily_report_id,
                'cause'=>$request->cause,
                'start'=>$request->start,
                'finish'=>$request->finish,
                'description'=>$request->description,
                'haveImpact'=>$haveImpact,
                'user_id'=>$request->user_id,
            ]);
            $dailyReport = DailyReport::find($request->daily_report_id);
            return redirect()->route('dailyReports.edit',$dailyReport);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(EventDailyReport $eventDailyReport){
        $dailyReport = DailyReport::find($eventDailyReport->daily_report_id);
        $eventDailyReport->delete();
        return redirect()->route('dailyReports.edit',$dailyReport);
    }
}
