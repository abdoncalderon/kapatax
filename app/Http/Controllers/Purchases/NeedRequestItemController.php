<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Models\Unity;
use App\Models\NeedRequest;
use App\Models\NeedRequestItem;
use App\Http\Requests\Session\UpdateNeedRequestItemRequest;
use Illuminate\Http\Request;
use Exception;

class NeedRequestItemController extends Controller
{
    public function edit(NeedRequestItem $needRequestItem)
    {
        $unities = Unity::get();
        return view('purchases.needRequestItems.edit',compact('needRequestItem'))
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

    public function quote(NeedRequestItem $needRequestItem)
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
            return redirect()->route('needRequests.review',$needRequestItem->needRequest);;
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
