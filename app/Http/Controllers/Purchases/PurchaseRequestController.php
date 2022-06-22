<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Models\PurchaseRequest;
use App\Models\QuotationRequest;
use App\Models\Stakeholder;
use App\Models\PurchaseRequestNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestForQuote;
use Carbon\Carbon;
use Exception;

class PurchaseRequestController extends Controller
{
    public function index()
    {
        $purchaseRequests = PurchaseRequest::select('purchase_requests.*')
                    ->join('project_users','purchase_requests.project_user_id','=','project_users.id')
                    ->where('project_users.project_id',current_user()->project_id)
                    ->where('purchase_requests.project_user_id',current_user()->id)
                    ->get();
        return view('purchases.purchaseRequests.index', compact('purchaseRequests'));
    }

    public function open(PurchaseRequest $purchaseRequest)
    {
        try{
            $suppliers = Stakeholder::where('project_id',current_user()->project_id)
                                    ->where('stakeholder_type_id',4)
                                    ->get();
            $notifications = PurchaseRequestNotification::select('purchase_request_notifications.*')
                            ->join('stakeholders','purchase_request_notifications.stakeholder_id','=','stakeholders.id')
                            ->join('purchase_requests','purchase_request_notifications.purchase_request_id','=','purchase_requests.id')
                            ->where('stakeholders.project_id',current_user()->project_id)
                            ->where('purchase_request_notifications.purchase_request_id',$purchaseRequest->id)
                            ->get();
            return view('purchases.purchaseRequests.open', compact('purchaseRequest'))
            ->with(compact('suppliers'))
            ->with(compact('notifications'));
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function send(PurchaseRequest $purchaseRequest){
        try{
            
            foreach($purchaseRequest->purchaseRequestNotifications as $notification){

                Mail::to($notification->stakeholder->email)->queue(new RequestForQuote($purchaseRequest));

                $notification->update([
                    'status_id' => '1',
                ]);
                $quotationRequest = QuotationRequest::create([
                    'purchase_request_id'=>$purchaseRequest->id,
                    'stakeholder_id'=>$notification->stakeholder_id,
                    'buyer_user_id'=>current_user()->id,
                    'sendDate'=> Carbon::now()->toDateString(),
                ]);
                
            }
            $purchaseRequest->update([
                'status_id' => '1',
            ]);
            return redirect()->route('purchaseRequests.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}


