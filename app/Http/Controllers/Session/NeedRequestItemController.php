<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\NeedRequest;
use App\Models\NeedRequestItem;
use App\Models\Unity;
use App\Http\Requests\Session\StoreNeedRequestItemRequest;
use App\Http\Requests\Session\UpdateNeedRequestItemRequest;
use Illuminate\Http\Request;
use Exception;

class NeedRequestItemController extends Controller
{
    public function store(StoreNeedRequestItemRequest $request )
    {
        try{
            $myNeedRequest = NeedRequest::find($request->need_request_id);
            NeedRequestItem::create($request->validated());
            return redirect()->route('myNeedRequests.edit',$myNeedRequest);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }

    public function edit(NeedRequestItem $myNeedRequestItem)
    {
        $unities = Unity::get();
        return view('session.myNeedRequestItems.edit',[
            'myNeedRequestItem'=>$myNeedRequestItem
        ])->with(compact('unities'));
    }

    public function update(NeedRequestItem $myNeedRequestItem, UpdateNeedRequestItemRequest $request)
    {
        try{
            $myNeedRequest = NeedRequest::find($request->need_request_id);
            $myNeedRequestItem->update($request->validated());
            return redirect()->route('myNeedRequests.edit',$myNeedRequest);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(NeedRequestItem $myNeedRequestItem)
    {
        try{
            $myNeedRequest = NeedRequest::find($myNeedRequestItem->need_request_id);
            $myNeedRequestItem->delete();
            return redirect()->route('myNeedRequests.edit',$myNeedRequest);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    } 


    
}
