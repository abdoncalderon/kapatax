<?php

namespace App\Http\Controllers;

use App\Models\PositionDailyReport;
use App\Models\DailyReport;
use App\Http\Requests\StorePositionDailyReportRequest;
use Illuminate\Http\Request;
use Exception;

class PositionDailyReportController extends Controller
{
    public function store(StorePositionDailyReportRequest $request){
        try{
            PositionDailyReport::create($request ->validated());
            $dailyReport = DailyReport::find($request->daily_report_id);
            return redirect()->route('dailyReports.edit',$dailyReport);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(PositionDailyReport $positionDailyReport){
        $dailyReport = DailyReport::find($positionDailyReport->daily_report_id);
        $positionDailyReport->delete();
        return redirect()->route('dailyReports.edit',$dailyReport);
    }

    public function clone(Request $request){
        $oldDailyReport = DailyReport::find($request->old_daily_report_id);
        $dailyReport = DailyReport::find($request->daily_report_id);
        foreach($oldDailyReport->positions as $positionDailyReport){
            PositionDailyReport::create([
                'daily_report_id'=>$request->daily_report_id,
                'contractor_id'=>$positionDailyReport->contractor_id,
                'position_id'=>$positionDailyReport->position_id,
                'quantity'=>$positionDailyReport->quantity,
            ]);
        }
        return redirect()->route('dailyReports.edit',$dailyReport);
    }
}
