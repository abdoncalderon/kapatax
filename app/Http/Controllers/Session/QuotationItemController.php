<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\PurchaseRequestItem;
use App\Models\Unity;
use Illuminate\Http\Request;
use Exception;

class QuotationItemController extends Controller
{
    public function quote(Quotation $myQuotation, PurchaseRequestItem $purchaseRequestItem){
        $unities = Unity::all();
        return view('session.myQuotationItems.create', compact('purchaseRequestItem'))
        ->with(compact('myQuotation'))
        ->with(compact('unities'));
    }

    public function store(Request $request){
        try{
            $myQuotation = Quotation::find($request->quotation_id);
            QuotationItem::create([
                'quotation_id'=>$request->quotation_id,
                'description'=>$request->description,
                'quantity'=>$request->quantity,
                'unity_id'=>$request->unity_id,
                'unitPrice'=>$request->unitPrice,
                'deliveryDate'=>$request->deliveryDate,
            ]);
            
            return redirect()->route('myQuotations.quote',$myQuotation);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(QuotationItem $myQuotationItem)
    {
        try{
            $myQuotationItem->delete();
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    } 


}
