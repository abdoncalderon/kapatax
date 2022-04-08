<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\NeedRequest;
use Illuminate\Http\Request;
use Exception;

class ApprovalController extends Controller
{
    public function index()
    {
        $approvals = NeedRequest::select('need_requests.*')
                    ->join('project_users','need_requests.project_user_id','=','project_users.id')
                    ->where('project_users.project_id',current_user()->project_id)
                    ->where('need_requests.approver_id',current_user()->user->person_id)
                    ->get();
        return view('session.myApprovals.index', compact('approvals'));
    }

    public function show(NeedRequest $needRequest)
    {
        return view('session.myApprovals.show',[
            'needRequest'=>$needRequest
            ]);
    }

    public function approval($id, $status){
        try{
            $needRequest = NeedRequest::find($id);
            $needRequest->update([
                'status_id'=> $status,
            ]);
            foreach($needRequest->needRequestItems as $needRequestItem){
                $needRequestItem->update([
                    'status_id'=> $status,
                ]);
            }
            return redirect()->route('myApprovals.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }
}
