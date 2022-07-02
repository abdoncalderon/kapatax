<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\NeedRequest;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Exception;

class ApprovalRequestController extends Controller
{
    public function index()
    {
        $needRequests = NeedRequest::select('need_requests.*')
                    ->join('project_users','need_requests.applicant_id','=','project_users.id')
                    ->where('project_users.project_id',current_user()->project_id)
                    ->where('need_requests.approver_id',current_user()->user->person_id)
                    ->where('need_requests.status_id','>','0')
                    ->get();
        
        return view('session.myApprovalsRequests.index',)
        ->with(compact('needRequests'));
    }

    public function showRequest(NeedRequest $needRequest)
    {
        return view('session.myApprovalsRequests.showRequest',compact('needRequest'));
    }

    public function approve($id, $status){
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
            return redirect()->route('myApprovalRequests.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }
}
