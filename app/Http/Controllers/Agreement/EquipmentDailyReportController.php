<?php

namespace App\Http\Controllers\Agreement;

use App\Http\Controllers\Controller;
use App\Models\EquipmentDailyReport;
use App\Models\DailyReport;
use App\Http\Requests\StoreEquipmentDailyReportRequest;
use Illuminate\Http\Request;
use Exception;

class EquipmentDailyReportController extends Controller
{
    public function store(StoreEquipmentDailyReportRequest $request){
        try{
            EquipmentDailyReport::create($request ->validated());
            $dailyReport = DailyReport::find($request->daily_report_id);
            return redirect()->route('dailyReports.edit',$dailyReport);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(EquipmentDailyReport $equipmentDailyReport){
        $dailyReport = DailyReport::find($equipmentDailyReport->daily_report_id);
        $equipmentDailyReport->delete();
        return redirect()->route('dailyReports.edit',$dailyReport);
    }

    public function clone(Request $request){
        $oldDailyReport = DailyReport::find($request->old_daily_report_id);
        $dailyReport = DailyReport::find($request->daily_report_id);
        foreach($oldDailyReport->equipments as $equipmentDailyReport){
            EquipmentDailyReport::create([
                'daily_report_id'=>$request->daily_report_id,
                'contractor_id'=>$equipmentDailyReport->contractor_id,
                'equipment_id'=>$equipmentDailyReport->equipment_id,
                'quantity'=>$equipmentDailyReport->quantity,
            ]);
        }
        return redirect()->route('dailyReports.edit',$dailyReport);
    }
}
