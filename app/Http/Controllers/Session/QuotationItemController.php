<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\QuotationRequestItem;
use App\Models\Unity;
use Illuminate\Http\Request;
use Exception;

class QuotationItemController extends Controller
{
    public function create(Quotation $myQuotation, QuotationRequestItem $quotationRequestItem){
        $unities = Unity::all();
        return view('session.myQuotationItems.create', compact('quotationRequestItem'))
        ->with(compact('myQuotation'))
        ->with(compact('unities'));
    }

    public function store(Request $request){
        try{
            QuotationItem::create([
                'quotation_request_id'=>$request->quotation_request_id,
                'description'=>$request->description,
                'quantity'=>$request->quantity,
                'unity_id'=>$request->unity_id,
                'unitPrice'=>$request->unitPrice,
                'deliveryDate'=>$request->deliveryDate,
                'status_id'=>'3',
            ]);
            return back();
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }
}
