<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\StoreQuotationRequestItemRequest;
use App\Models\QuotationRequest;
use App\Models\QuotationRequestItem;
use Illuminate\Http\Request;
use Exception;

class QuotationRequestItemController extends Controller
{
    public function store(StoreQuotationRequestItemRequest $request )
    {
        try{
            $quotationRequest = QuotationRequest::find($request->quotation_request_id);
            QuotationRequestItem::create($request->validated());
            return redirect()->back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }
}
