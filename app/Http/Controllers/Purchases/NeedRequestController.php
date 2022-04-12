<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Models\NeedRequest;
use App\Models\NeedRequestItem;
use App\Models\Stakeholder;
use App\Models\QuotationRequest;
use App\Models\QuotationRequestItem;
use App\Models\QuotationRequestNotification;
use App\Models\DestockingRequest;
use App\Models\DestockingRequestItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;

class NeedRequestController extends Controller
{
    public function index()
    {
        $needRequests = NeedRequest::select('need_requests.*')
                    ->join('project_users','need_requests.project_user_id','=','project_users.id')
                    ->where('project_users.project_id',current_user()->project_id)
                    ->where('status_id','>=',3)
                    ->get();
        return view('purchases.needRequests.index', compact('needRequests'));
    }

    public function review(NeedRequest $needRequest)
    {
        try{
            return view('purchases.needRequests.review', compact('needRequest'));
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function show(NeedRequest $needRequest)
    {
        return view('purchases.needRequests.show',compact('needRequest'));
    }

    public function process(NeedRequest $needRequest){
        try{
            /* make quotation request */

            $itemsForQuote = NeedRequestItem::where('need_request_id',$needRequest->id)
                                            ->where('status_id','4')
                                            ->get();
            if($itemsForQuote->count()>0){
                $quotationRequest = QuotationRequest::create([
                    'need_request_id' => $needRequest->id,
                    'project_user_id' => current_user()->id,
                    'date' => Carbon::now()->toDateString(),
                ]);
                foreach ($itemsForQuote as $item){
                    QuotationRequestItem::create([
                        'quotation_request_id'=>$quotationRequest->id,
                        'need_request_item_id'=>$item->id,
                        'reference'=>$item->reference,
                        'quantity'=>$item->quantity,
                        'unity_id'=>$item->unity_id,
                    ]);
                }
            }

            /* make destoking */

            $itemsForDestocking = NeedRequestItem::where('need_request_id',$needRequest->id)
                                            ->where('status_id','5')
                                            ->get();
            if($itemsForDestocking->count()>0){
                $destockingRequest = destockingRequest::create([
                    'need_request_id' => $needRequest->id,
                    'project_user_id' => current_user()->id,
                    'date' => Carbon::now()->toDateString(),
                ]);
                foreach ($itemsForDestocking as $item){
                    DestockingRequestItem::create([
                        'destocking_request_id'=>$destockingRequest->id,
                        'need_request_item_id'=>$item->id,
                        'reference'=>$item->reference,
                        'quantity'=>$item->quantity,
                        'unity_id'=>$item->unity_id,
                    ]);
                }
            }

            /* update status need request */

            $needRequest->update([
                'status_id'=>'4',
            ]);
            
            return redirect()->route('needRequests.index');


        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

}
