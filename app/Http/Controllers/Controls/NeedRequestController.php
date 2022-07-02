<?php

namespace App\Http\Controllers\Controls;

use App\Http\Controllers\Controller;
use App\Models\NeedRequest;
use App\Models\NeedRequestItem;
use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestItem;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

class NeedRequestController extends Controller
{
    public function index()
    {
        $needRequests = NeedRequest::select('need_requests.*')
                    ->join('project_users','need_requests.applicant_id','=','project_users.id')
                    ->where('project_users.project_id',current_user()->project_id)
                    ->where('status_id','>=',3)
                    ->get();
        return view('controls.needRequests.index', compact('needRequests'));
    }

    public function review(NeedRequest $needRequest)
    {
        try{
            return view('controls.needRequests.review', compact('needRequest'));
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function show(NeedRequest $needRequest)
    {
        return view('controls.needRequests.show',compact('needRequest'));
    }

    public function process(Request $request)
    {
        try{
            $needRequest = NeedRequest::find($request->need_request_id);

            /* classify need request items by type */

            for($i=0; $i<count($request->needRequestItems); $i++){
                $needRequestItem = NeedRequestItem::find($request->needRequestItems[$i]);
                $needRequestItem->update([
                    'status_id'=>'4',
                    'processType_id'=>$request->processType[$i],
                ]);
            }

            /* select need request items for purchase */

            $itemsForPurchaseRequest = NeedRequestItem::where('need_request_id',$request->need_request_id)
                                            ->where('processType_id','0')
                                            ->get();
            
            /* if exist items for purchase */

            if($itemsForPurchaseRequest->count()>0)
            {
                /* create purchase request */

                $purchaseRequest = PurchaseRequest::create([
                    'need_request_id' => $request->need_request_id,
                    'sorter_id' => current_user()->id,
                    'date' => Carbon::now()->toDateString(),
                ]);

                /* create purchase request items */

                foreach ($itemsForPurchaseRequest as $item){
                    PurchaseRequestItem::create([
                        'purchase_request_id'=>$purchaseRequest->id,
                        'need_request_item_id'=>$item->id,
                        'reference'=>$item->reference,
                        'quantity'=>$item->quantity,
                        'unity_id'=>$item->unity_id,
                    ]);
                }
            }

            /* update status need request in processed */

            $needRequest->update([
                'status_id'=>'4',
            ]);

            return redirect()->route('needRequests.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

}
