<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use App\Models\PurchaseRequestNotification;
use Illuminate\Http\Request;
use Exception;

class PurchaseRequestNotificationController extends Controller
{
    public function store(Request $request)
    {
        try{
            PurchaseRequestNotification::create([
                'purchase_request_id' => $request->purchase_request_id,
                'stakeholder_id' => $request->stakeholder_id,
            ]);
            return redirect()->back();
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(PurchaseRequestNotification $purchaseRequestNotification)
    {
        try{
            $purchaseRequestNotification->delete();
            return redirect()->route('areas.index');
        }catch(Exception $e){
            return back()->withErrors($e->getMessage());
        }
    } 
}
