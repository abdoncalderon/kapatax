<?php

namespace App\Http\Controllers;

use App\Models\AttachmentDailyReport;
use App\Models\DailyReport;
use App\Http\Requests\StoreAttachmentDailyReportRequest;
use Exception;


class AttachmentDailyReportController extends Controller
{
    public function store(StoreAttachmentDailyReportRequest $request){
        try{
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $filename = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/images/attachments/daily_reports/',$filename);
                $request ->validated();
                AttachmentDailyReport::create([
                    'daily_report_id'=>$request->daily_report_id,
                    'filename'=>$filename,
                    'description'=>$request->description,
                    'user_id'=>$request->user_id,
                ]);
                $dailyReport = DailyReport::find($request->daily_report_id);
                return redirect()->route('dailyReports.edit',$dailyReport);
            }else{
                return back()->withErrors('no File');
            }
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(AttachmentDailyReport $attachmentDailyReport){
        $dailyReport = DailyReport::find($attachmentDailyReport->daily_report_id);
        $filename = $attachmentDailyReport->filename;
        $attachmentDailyReport->delete();
        unlink(public_path().'/images/attachments/daily_reports/'.$filename);
        return redirect()->route('dailyReports.edit',$dailyReport);
    }
}
