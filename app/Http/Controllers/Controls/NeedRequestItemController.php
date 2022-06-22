<?php

namespace App\Http\Controllers\Controls;

use App\Http\Controllers\Controller;
use App\Models\Unity;
use App\Models\NeedRequestItem;
use App\Http\Requests\Session\UpdateNeedRequestItemRequest;
use App\Models\NeedRequest;
use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestItem;

use Carbon\Carbon;
use Exception;

class NeedRequestItemController extends Controller
{
    public function edit(NeedRequestItem $needRequestItem)
    {
        $unities = Unity::get();
        return view('controls.needRequestItems.edit',compact('needRequestItem'))
        ->with(compact('unities'));
    }

    public function update(NeedRequestItem $needRequestItem, UpdateNeedRequestItemRequest $request)
    {
        try{
            $needRequestItem->update($request->validated());
            return redirect()->route('needRequests.review',$needRequestItem->needRequest);;
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    /* public function purchase(NeedRequestItem $needRequestItem)
    {
        try{
            $needRequestItem->update([
                'status_id'=>'4',
            ]);
            return redirect()->route('needRequests.review',$needRequestItem->needRequest);;
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destocking(NeedRequestItem $needRequestItem)
    {
        try{
            $needRequestItem->update([
                'status_id'=>'5',
            ]);
            return redirect()->route('needRequests.review',$needRequestItem->needRequest);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    } */

    


}
