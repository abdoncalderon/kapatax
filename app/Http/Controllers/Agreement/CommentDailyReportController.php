<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CommentDailyReport;
use App\Models\DailyReport;
use App\Models\LocationUser;
use App\Http\Requests\StoreCommentDailyReportRequest;
use App\Mail\CommentReportCreated;
use Exception;
use Illuminate\Support\Facades\Mail;

class CommentDailyReportController extends Controller
{
    public function store(StoreCommentDailyReportRequest $request){
        try{
            $dailyReport = DailyReport::find($request->daily_report_id);
            $date = strtotime($dailyReport->folio->date);
            $today = strtotime(Carbon::today()->toDateString());
            $differenceInHours = abs(round(($date - $today)/60/60,0));
            if (($differenceInHours <= $dailyReport->folio->location->max_time_create_comment)){
                $comment = CommentDailyReport::create($request ->validated());
                $usersReceiveNotification = LocationUser::where('location_id',$dailyReport->folio->location_id)->where('receive_notification',1)->get();
                foreach ($usersReceiveNotification as $user){
                    Mail::to($user->user->email)->queue(new CommentReportCreated($comment));
                }
                $dailyReport = DailyReport::find($request->daily_report_id);
                return redirect()->route('dailyReports.review',$dailyReport);
            }else{
                return back()->withErrors(__('messages.timeexpiredtocreate').' '.__('content.comment'));
            }
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(CommentDailyReport $commentDailyReport){
        $dailyReport = DailyReport::find($commentDailyReport->daily_report_id);
        $commentDailyReport->delete();
        return redirect()->route('dailyReports.review',$dailyReport);
    }
}
