<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Models\QuotationRequest;
use App\Models\Stakeholder;
use App\Models\QuotationRequestNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestForQuote;
use Illuminate\Http\Request;
use Exception;

class QuotationRequestController extends Controller
{
    public function index()
    {
        $quotationRequests = QuotationRequest::select('quotation_requests.*')
                    ->join('project_users','quotation_requests.project_user_id','=','project_users.id')
                    ->where('project_users.project_id',current_user()->project_id)
                    ->where('quotation_requests.project_user_id',current_user()->id)
                    ->get();
        return view('purchases.quotationRequests.index', compact('quotationRequests'));
    }

    public function open(QuotationRequest $quotationRequest)
    {
        try{
            $suppliers = Stakeholder::where('project_id',current_user()->project_id)
                                    ->where('stakeholder_type_id',4)
                                    ->get();
            $notifications = QuotationRequestNotification::select('quotation_request_notifications.*')
                            ->join('stakeholders','quotation_request_notifications.stakeholder_id','=','stakeholders.id')
                            ->join('quotation_requests','quotation_request_notifications.quotation_request_id','=','quotation_requests.id')
                            ->where('stakeholders.project_id',current_user()->project_id)
                            ->where('quotation_request_notifications.quotation_request_id',$quotationRequest->id)
                            ->get();
            return view('purchases.quotationRequests.open', compact('quotationRequest'))
            ->with(compact('suppliers'))
            ->with(compact('notifications'));
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function send(QuotationRequest $quotationRequest){
        try{
            
            foreach($quotationRequest->quotationRequestNotifications as $notification){
                Mail::to($notification->stakeholder->email)->queue(new RequestForQuote($quotationRequest));
                $notification->update([
                    'status_id' => '1',
                ]);
            }
            $quotationRequest->update([
                'status_id' => '1',
            ]);
            return redirect()->route('quotationRequests.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
