<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\StorePurchaseRequestItemRequest;
use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestItem;
use Exception;

class PurchaseRequestItemController extends Controller
{
    public function store(StorePurchaseRequestItemRequest $request )
    {
        try{
            $purchaseRequest = PurchaseRequest::find($request->quotation_request_id);
            PurchaseRequestItem::create($request->validated());
            return redirect()->back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }
}
