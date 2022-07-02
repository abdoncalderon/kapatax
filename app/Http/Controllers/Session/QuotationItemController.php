<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\NeedRequestItem;
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
            $myQuotationItem = QuotationItem::where('purchase_request_item_id',$request->purchase_request_item_id)
                                        ->where('quotation_id',$myQuotation->id)
                                        ->first();
            if ($myQuotationItem != null){
                $myQuotationItem->delete();
            }

            QuotationItem::create([
                'quotation_id'=>$request->quotation_id,
                'purchase_request_item_id'=>$request->purchase_request_item_id,
                'description'=>$request->description,
                'quantity'=>$request->offeredQuantity,
                'unity_id'=>$request->unity_id,
                'unitPrice'=>$request->unitPrice,
                'deliveryDate'=>$request->deliveryDate,
            ]);

            $totalQuotation = $myQuotation->totalPrice;

            $quantity = $request->offeredQuantity;
            $price = $request->unitPrice;
            $subtotal = $quantity * $price;

            $totalQuotation = $totalQuotation + $subtotal;

            $myQuotation->update([
                'totalPrice'=>$totalQuotation,
            ]);
            
            
            return redirect()->route('myQuotations.quote',$myQuotation);
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(QuotationItem $myQuotationItem)
    {
        try{
            $totalQuotation = $myQuotationItem->myQuotation->totalPrice;
            $quantity = $myQuotationItem->quantity;
            $price = $myQuotationItem->unitPrice;
            $subtotal = $quantity * $price;

            $totalQuotation = $totalQuotation - $subtotal;

            $myQuotationItem->myQuotation->update([
                'totalPrice'=>$totalQuotation,
            ]);

            $myQuotationItem->delete();

            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    } 


}
