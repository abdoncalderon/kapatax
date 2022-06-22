<?php

namespace App\Http\Controllers\Controls;

use App\Http\Controllers\Controller;
use App\Models\ReceptionItem;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

class ReceptionItemController extends Controller
{
    public function store(Request $request)
    {
        try{
            
            $receptionItem = ReceptionItem::create([
                'reception_id'=>$request->reception_id,
                'purchase_order_item_id'=>$request->purchase_order_item_id,
                'date'=> Carbon::now()->toDateString(),
                'quantity'=>$request->quantity,
            ]);
            $consumptionAvailable = $receptionItem->purchaseOrderItem->consumptionAvailable;
            $quantity = $receptionItem->quantity;
            $newConsumption = $consumptionAvailable - $quantity;
            $receptionItem->purchaseOrderItem->update([
                'consumptionAvailable'=> $newConsumption,
            ]);
            return redirect()->route('receptions.edit',$receptionItem->reception);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(ReceptionItem $receptionItem)
    {
        try{
            $consumptionAvailable = $receptionItem->purchaseOrderItem->consumptionAvailable;
            $quantity = $receptionItem->quantity;
            $newConsumption = $consumptionAvailable + $quantity;
            $receptionItem->purchaseOrderItem->update([
                'consumptionAvailable'=> $newConsumption,
            ]);
            $receptionItem->delete();
            return back();
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    } 
}
