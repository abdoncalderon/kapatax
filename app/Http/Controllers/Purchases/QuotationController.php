<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;

class QuotationController extends Controller
{
    public function index()
    {
        $quotations = Quotation::select('quotations.*')
                    ->join('project_users','quotations.seller_user_id','=','project_users.id')
                    ->where('project_users.project_id',current_user()->project_id)
                    ->where('status_id','>',0)
                    ->get();
        return view('purchases.quotations.index', compact('quotations'));
    }


    public function open(Quotation $quotation)
    {
        try{
            $quotation->update([
                'status_id'=>'2',
            ]);
            return view('purchases.quotations.open', compact('quotation'));
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function show(Quotation $quotation)
    {
        try{
            return view('purchases.quotations.show', compact('quotation'));
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function approve(Quotation $quotation){
        try{
            $quotation->update([
                'status_id'=>'3',
            ]);
            $purchaseOrder = PurchaseOrder::create([
                'quotation_id'=>$quotation->id,
                'sendDate'=>Carbon::now()->toDateString(),
                'buyer_user_id'=>current_user()->id,
            ]);
            foreach ($quotation->quotationItems as $quotationItem){
                PurchaseOrderItem::create([
                    'purchase_order_id'=>$purchaseOrder->id,
                    'quotation_item_id'=>$quotationItem->id,
                    'description'=>$quotationItem->description,
                    'quantity'=>$quotationItem->quantity,
                    'consumptionAvailable'=>$quotationItem->quantity,
                    'unity_id'=>$quotationItem->unity_id,
                    'unitPrice'=>$quotationItem->unitPrice,
                    'deliveryDate'=>$quotationItem->deliveryDate,
                ]);
            }
            return redirect()->route('quotations.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function discard(Quotation $quotation){
        try{
            $quotation->update([
                'status_id'=>'4',
            ]);
            $quotation->quotationRequest->update([
                'status_id'=>'4',
            ]);
            return redirect()->route('quotations.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }


}
