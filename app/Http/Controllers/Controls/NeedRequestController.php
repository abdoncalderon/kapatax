<?php

namespace App\Http\Controllers\Controls;

use App\Http\Controllers\Controller;
use App\Models\NeedRequest;
use App\Models\NeedRequestItem;
use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestItem;

use App\Models\DestockingRequest;
use App\Models\DestockingRequestItem;
use Illuminate\Http\Request;
use Carbon\Carbon;
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

    public function processXX(NeedRequest $needRequest){
        try{
            
            /* make purchase request */

            $itemsForQuote = NeedRequestItem::where('need_request_id',$needRequest->id)
                                            ->where('status_id','4')
                                            ->get();
            if($itemsForQuote->count()>0){
                $purchaseRequest = PurchaseRequest::create([
                    'need_request_id' => $needRequest->id,
                    'project_user_id' => current_user()->id,
                    'date' => Carbon::now()->toDateString(),
                ]);
                foreach ($itemsForQuote as $item){
                    PurchaseRequestItem::create([
                        'purchase_request_id'=>$purchaseRequest->id,
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

    public function process(Request $request)
    {
        try{
            $needRequest = NeedRequest::find($request->need_request_id);

            /* classify need request items*/

            for($i=0; $i<count($request->needRequestItems); $i++){
                $needRequestItem = NeedRequestItem::find($request->needRequestItems[$i]);
                $needRequestItem->update([
                    'status_id'=>'4',
                    'class_id'=>$request->class[$i],
                ]);
            }

            /* make purchase request */

            $itemsForPurchaseRequest = NeedRequestItem::where('need_request_id',$request->need_request_id)
                                            ->where('class_id','0')
                                            ->get();
            if($itemsForPurchaseRequest->count()>0){
                $purchaseRequest = PurchaseRequest::create([
                    'need_request_id' => $request->need_request_id,
                    'project_user_id' => current_user()->id,
                    'date' => Carbon::now()->toDateString(),
                ]);

                /* make purchase request items */

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

            /* update status need request */

            $needRequest->update([
                'status_id'=>'4',
            ]);

            return redirect()->route('needRequests.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

}
